import {
    Boxes,
    Database,
    Globe,
    Server,
} from 'lucide-react';

export interface HomeTechnologyGroup {
    key: string;
    icon: typeof Server;
    technologies: string[];
}

export const technologies: HomeTechnologyGroup[] = [
    {
        key: 'backend',
        icon: Server,
        technologies: [
            'PHP',
            'Laravel',
            'Symfony',
            'Node.js',
            'REST API',
        ],
    },
    {
        key: 'ecommerce',
        icon: Boxes,
        technologies: [
            'Shopware',
            'OXID',
            'Pimcore',
        ],
    },
    {
        key: 'frontend',
        icon: Globe,
        technologies: [
            'React',
            'TypeScript',
            'JavaScript',
            'Vite',
            'SCSS',
        ],
    },
    {
        key: 'infrastructure',
        icon: Database,
        technologies: [
            'Linux',
            'Docker',
            'DDEV',
            'Git',
            'MySQL',
        ],
    },
];