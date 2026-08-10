import SidebarItem from './SidebarItem';
import MenuService from '@/services/MenuService';

export default function Sidebar() {

    const items = MenuService.getMenu();

    return (
        <>
            {items.map(item => (
                <SidebarItem
                    key={item.id}
                    {...item}
                />
            ))}
        </>
    );
}