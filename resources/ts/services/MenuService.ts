import modules from '@/app/generated/modules';
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

    public getModuleMenu(): MenuItem[] {
        return modules.flatMap(
            (module) => module.navigation ?? [],
        );
    }

    public getMenu(): MenuItem[] {
        return [
            ...this.getCoreMenu(),
            ...this.getModuleMenu(),
        ].sort((a, b) => a.order - b.order);
    }
}

export default new MenuService();