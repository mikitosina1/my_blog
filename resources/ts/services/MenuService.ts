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
            },

            {
                id: 'about',
                title: 'aside.about',
                route: '/about',
                section: 'core',
                order: 20,
            },

        ];

    }

}

export default new MenuService();
