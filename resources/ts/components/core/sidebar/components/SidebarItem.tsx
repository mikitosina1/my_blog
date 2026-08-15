import {NavLink,} from 'react-router-dom';

import tr from '@/services/TranslationService';
import IconService from '@/services/IconService';

interface SidebarItemProps {
    title: string;
    route: string;
    icon?: string;
}

export default function SidebarItem({
                                        title,
                                        route,
                                        icon,
                                    }: SidebarItemProps) {
    const Icon = IconService.get(icon);

    return (
        <NavLink
            to={route}
            end={route === '/'}
            className={({isActive}) =>
                `sidebar-item ${
                    isActive
                        ? 'sidebar-item--active'
                        : ''
                }`
            }
        >
            {Icon && (
                <Icon
                    size={19}
                    strokeWidth={1.8}
                    className="sidebar-item__icon"
                />
            )}

            <span className="sidebar-item__title">
                {tr.t(title)}
            </span>
        </NavLink>
    );
}