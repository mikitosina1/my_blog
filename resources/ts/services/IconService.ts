import type { LucideIcon } from 'lucide-react';

import modules from '@/app/generated/modules';
import { coreIcons } from '@/components/core/icons/coreIcons';

class IconService {
    private readonly icons: Record<string, LucideIcon>;

    constructor() {
        this.icons = this.buildRegistry();
    }

    public get(name?: string): LucideIcon | null {
        if (!name) {
            return null;
        }

        return this.icons[name] ?? null;
    }

    private buildRegistry(): Record<string, LucideIcon> {
        const registry: Record<string, LucideIcon> = {};

        /*
         * Core icons
         */
        for (const [name, icon] of Object.entries(coreIcons)) {
            registry[name] = icon;
            registry[`core:${name}`] = icon;
        }

        /*
         * Module icons
         */
        for (const module of modules) {
            if (!module.icons) {
                continue;
            }

            for (const [name, icon] of Object.entries(module.icons)) {
                registry[`${module.id}:${name}`] = icon;
            }
        }

        return registry;
    }
}

export default new IconService();
