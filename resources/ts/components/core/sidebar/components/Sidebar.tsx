import SidebarItem from './SidebarItem';
import MenuService from '@/services/MenuService';

import {useAuth} from "@/app/providers/AuthProvider";

export default function Sidebar() {

    const {user} = useAuth();
    const items = MenuService.getMenu(user);

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