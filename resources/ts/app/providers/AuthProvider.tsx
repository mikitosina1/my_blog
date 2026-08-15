import {createContext, type ReactNode, useCallback, useContext, useEffect, useMemo, useState,} from 'react';

export interface User {
    id: number;
    name: string;
    lastname: string;
    email: string;
    role: string | null;
    profile_photo: string | null;
}

interface AuthContextValue {
    user: User | null;
    isAuthenticated: boolean;
    isLoading: boolean;
    logout: () => Promise<void>;
}

const AuthContext = createContext<AuthContextValue | undefined>(
    undefined,
);

interface AuthProviderProps {
    children: ReactNode;
}

export default function AuthProvider({
                                         children,
                                     }: AuthProviderProps) {
    const [user, setUser] = useState<User | null>(null);
    const [isLoading, setIsLoading] = useState(true);

    const loadUser = useCallback(async () => {
        try {
            const response = await fetch('/api/v1/me', {
                method: 'GET',
                credentials: 'same-origin',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            if (response.status === 401) {
                setUser(null);
                return;
            }

            if (!response.ok) {
                console.error(
                    `Failed to load current user: ${response.status}`,
                );

                setUser(null);
                return;
            }

            const responseData: { data: User } =
                await response.json();

            setUser(responseData.data);
        } catch (error) {
            console.error(
                'Failed to load current user.',
                error,
            );

            setUser(null);
        } finally {
            setIsLoading(false);
        }
    }, []);

    useEffect(() => {
        void loadUser();
    }, [loadUser]);

    const logout = useCallback(async () => {
        const csrfToken = document
            .querySelector<HTMLMetaElement>(
                'meta[name="csrf-token"]',
            )
            ?.content;

        const response = await fetch('/logout', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                ...(csrfToken
                    ? {'X-CSRF-TOKEN': csrfToken}
                    : {}),
            },
        });

        if (!response.ok) {
            throw new Error(
                `Logout failed: ${response.status}`,
            );
        }

        setUser(null);
    }, []);

    const value = useMemo<AuthContextValue>(
        () => ({
            user,
            isAuthenticated: user !== null,
            isLoading,
            logout,
        }),
        [user, isLoading, logout],
    );

    return (
        <AuthContext.Provider value={value}>
            {children}
        </AuthContext.Provider>
    );
}

export function useAuth(): AuthContextValue {
    const context = useContext(AuthContext);

    if (!context) {
        throw new Error(
            'useAuth must be used within an AuthProvider.',
        );
    }

    return context;
}