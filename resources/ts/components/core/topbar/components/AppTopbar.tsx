import {useMatches} from 'react-router-dom';

import LanguageSwitcher from './LanguageSwitcher';
import ThemeSwitcher from './ThemeSwitcher';
import UserMenu from './UserMenu';

import tr from '@/services/TranslationService';

interface RouteHandle {
    breadcrumb?: string;
}

export default function AppTopbar() {
    const matches = useMatches();

    const currentMatch = matches[matches.length - 1];

    const handle = currentMatch.handle as RouteHandle | undefined;

    const title = handle?.breadcrumb
        ? tr.t(handle.breadcrumb)
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
                <LanguageSwitcher/>
                <ThemeSwitcher/>
                <UserMenu/>
            </div>
        </header>
    );
}