import { useEffect, useState } from 'react';
import { Moon, Sun } from 'lucide-react';

import IconButton from '@/components/ui/IconButton';

type Theme = 'light' | 'dark';

const STORAGE_KEY = 'theme';

function getInitialTheme(): Theme {
    const savedTheme = localStorage.getItem(STORAGE_KEY);

    if (savedTheme === 'light' || savedTheme === 'dark') {
        return savedTheme;
    }

    return 'dark';
}

function applyTheme(theme: Theme): void {
    document.documentElement.dataset.theme = theme;
}

export default function ThemeSwitcher() {
    const [theme, setTheme] = useState<Theme>(getInitialTheme);

    useEffect(() => {
        applyTheme(theme);
    }, [theme]);

    const toggleTheme = () => {
        setTheme(currentTheme => {
            const nextTheme =
                currentTheme === 'dark'
                    ? 'light'
                    : 'dark';

            localStorage.setItem(STORAGE_KEY, nextTheme);

            return nextTheme;
        });
    };

    const isDark = theme === 'dark';

    return (
        <IconButton
            type="button"
            aria-label={
                isDark
                    ? 'Switch to light theme'
                    : 'Switch to dark theme'
            }
            title={
                isDark
                    ? 'Light theme'
                    : 'Dark theme'
            }
            onClick={toggleTheme}
        >
            {isDark ? (
                <Moon size={18} />
            ) : (
                <Sun size={18} />
            )}
        </IconButton>
    );
}