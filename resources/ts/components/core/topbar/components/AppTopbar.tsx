import { useLocation } from 'react-router-dom';

import LanguageSwitcher from './LanguageSwitcher';
import ThemeSwitcher from './ThemeSwitcher';
import UserMenu from './UserMenu';

import tr from '@/services/TranslationService';

interface PageInfo {
    title: string;
}

const pages: Record<string, PageInfo> = {
    '/': {
        title: 'home.title',
    },

    '/about': {
        title: 'about.about.title',
    },
};

export default function AppTopbar() {
    const location = useLocation();

    const page = pages[location.pathname];

    const title = page
        ? tr.t(page.title)
        : '';

    return (
        <header className="app-topbar">
            <div className="app-topbar__left">
                {title && (
                    <h1 className="app-topbar__title">
                        {title}
                    </h1>
                )}
            </div>

            <div className="app-topbar__right">
                <LanguageSwitcher />
                <ThemeSwitcher />
                <UserMenu />
            </div>
        </header>
    );
}