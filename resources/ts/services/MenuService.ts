import { MenuItem } from '@/types/Menu';

class MenuService {

    public getCoreMenu(): MenuItem[] {

        return [

            {
                id: 'home',
                title: 'aside.home',
                route: '/',
                section: 'core',
                order: 10,
                active: true,
                icon: 'home',
            },

            {
                id: 'about',
                title: 'aside.about',
                route: '/about',
                section: 'core',
                order: 20,
                active: true,
                icon: 'about',
            },

        ];

    }

}

export default new MenuService();
