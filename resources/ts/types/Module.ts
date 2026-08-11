import type { LucideIcon } from 'lucide-react';
import type { RouteObject } from 'react-router-dom';

import type { MenuItem } from './Menu';

export interface ReactModule {
    id: string;
    name: string;

    routes?: RouteObject[];

    navigation?: MenuItem[];

    icons?: Record<string, LucideIcon>;
}