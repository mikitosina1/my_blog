export interface MenuItem {
    id: string;
    title: string;
    route: string;
    section: string;
    order: number;
    icon?: string;
    module?: string;
    requiresAuth?: boolean;
    roles?: string[];
}