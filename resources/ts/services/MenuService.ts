import modules from '@/app/generated/modules';
import type { User } from '@/app/providers/AuthProvider';
import type { MenuItem } from '@/types/Menu';

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

    public getMenu(user: User | null): MenuItem[] {
        return [
            ...this.getCoreMenu(),
            ...this.getModuleMenu(),
        ]
            .filter((item) => this.canAccess(item, user))
            .sort((a, b) => a.order - b.order);
    }

    private canAccess(
        item: MenuItem,
        user: User | null,
    ): boolean {
        if (item.requiresAuth && !user) {
            return false;
        }

        if (item.roles && item.roles.length > 0) {
            if (!user) {
                return false;
            }

            return item.roles.includes(user.role ?? '');
        }

        return true;
    }
}

export default new MenuService();