export interface MenuItem {
    id: string;
    title: string;
    route: string;
    section: string;
    order: number;
    active?: boolean;
    icon?: string;
    module?: string;
}