import Dropdown from '@/components/ui/Dropdown';
import IconButton from '@/components/ui/IconButton';
import { useAuth } from '@/app/providers/AuthProvider';

import {
    LogOut,
    Settings,
    UserRound,
} from 'lucide-react';

import tr from '@/services/TranslationService';

import './user-menu.scss';

export default function UserMenu() {
    const {
        user,
        isAuthenticated,
        isLoading,
        logout,
    } = useAuth();

    if (isLoading) {
        return null;
    }

    if (!isAuthenticated || !user) {
        return (
            <Dropdown
                trigger={
                    <IconButton aria-label="User">
                        <UserRound size={18} />
                    </IconButton>
                }
            >
                <div className="user-menu">
                    <a
                        href="/login"
                        className="user-menu__item"
                    >
                        <UserRound size={17} />
                        <span>
                            {tr.t('user_cloud.login')}
                        </span>
                    </a>

                    <a
                        href="/register"
                        className="user-menu__item"
                    >
                        <UserRound size={17} />
                        <span>
                            {tr.t('user_cloud.register')}
                        </span>
                    </a>
                </div>
            </Dropdown>
        );
    }

    const initials = `${user.name?.[0] ?? ''}${user.lastname?.[0] ?? ''}`
        .toUpperCase();

    const handleLogout = async () => {
        try {
            await logout();

            window.location.href = '/';
        } catch (error) {
            console.error('Logout failed.', error);
        }
    };

    return (
        <Dropdown
            trigger={
                <IconButton
                    aria-label={`${user.name} ${user.lastname}`}
                    className="user-menu__trigger"
                >
                    {user.profile_photo ? (
                        <img
                            src={user.profile_photo}
                            alt=""
                            className="user-menu__avatar user-menu__avatar--trigger"
                        />
                    ) : (
                        <span className="user-menu__initials user-menu__initials--trigger">
                            {initials}
                        </span>
                    )}
                </IconButton>
            }
        >
            <div className="user-menu">
                <div className="user-menu__header">
                    {user.profile_photo ? (
                        <img
                            src={user.profile_photo}
                            alt=""
                            className="user-menu__avatar"
                        />
                    ) : (
                        <span className="user-menu__initials">
                            {initials}
                        </span>
                    )}

                    <div className="user-menu__identity">
                        <strong className="user-menu__name">
                            {user.name} {user.lastname}
                        </strong>

                        <span className="user-menu__email">
                            {user.email}
                        </span>

                        {user.role && (
                            <span className="user-menu__role">
                                {user.role}
                            </span>
                        )}
                    </div>
                </div>

                <div className="user-menu__divider" />

                <a
                    href="/profile"
                    className="user-menu__item"
                >
                    <UserRound size={17} />
                    <span>
                        {tr.t('user_cloud.profile')}
                    </span>
                </a>

                <button
                    type="button"
                    className="user-menu__item"
                >
                    <Settings size={17} />
                    <span>
                        {tr.t('user_cloud.settings')}
                    </span>
                </button>

                <div className="user-menu__divider" />

                <button
                    type="button"
                    className="user-menu__item user-menu__item--danger"
                    onClick={() => void handleLogout()}
                >
                    <LogOut size={17} />
                    <span>
                        {tr.t('user_cloud.logout')}
                    </span>
                </button>
            </div>
        </Dropdown>
    );
}