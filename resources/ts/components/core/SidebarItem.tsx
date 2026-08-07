import tr from '@/services/TranslationService';

interface SidebarItemProps {
    title: string;
    href: string;
    active?: boolean;
}

export default function SidebarItem({
                                        title,
                                        href,
                                        active = false,
                                    }: SidebarItemProps) {

    return (
        <a
            href={href}
            className={`sidebar-item ${active ? 'sidebar-item--active' : ''}`}
        >
            {tr.t(title)}
        </a>
    );
}
