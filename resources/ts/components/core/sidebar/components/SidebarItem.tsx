import { NavLink } from 'react-router-dom';

import tr from '@/services/TranslationService';

interface SidebarItemProps {
    title: string;
    route: string;
}

export default function SidebarItem({
                                        title,
                                        route,
                                    }: SidebarItemProps) {
    return (
        <NavLink
            to={route}
            className={({ isActive }) =>
                `sidebar-item${isActive ? ' sidebar-item--active' : ''}`
            }
        >
            {tr.t(title)}
        </NavLink>
    );
}