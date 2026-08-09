export interface TechnologyGroup {
    key:
        | 'backend'
        | 'frontend'
        | 'databases'
        | 'apis'
        | 'infrastructure'
        | 'architecture'
        | 'tools';

    technologies: string[];
}

export const technologies: TechnologyGroup[] = [
    {
        key: 'backend',
        technologies: [
            'PHP',
            'Laravel',
            'Symfony',
            'Shopware',
            'OXID',
            'Pimcore',
            'Node.js',
            'NestJS',
        ],
    },

    {
        key: 'frontend',
        technologies: [
            'React',
            'Vue.js',
            'JavaScript',
            'HTML',
            'CSS',
            'SASS / LESS',
            'Tailwind CSS',
            'Bootstrap',
            'jQuery',
            'Vite',
        ],
    },

    {
        key: 'databases',
        technologies: [
            'MySQL',
            'PostgreSQL',
            'MongoDB',
            'PDO',
        ],
    },

    {
        key: 'apis',
        technologies: [
            'REST API',
            'Webhooks',
            'API Integration',
        ],
    },

    {
        key: 'infrastructure',
        technologies: [
            'Linux',
            'Git',
            'Docker',
            'DDEV',
            'Vagrant',
            'Composer',
            'SSH',
        ],
    },

    {
        key: 'architecture',
        technologies: [
            'OOP',
            'SOLID',
            'MVC',
            'DTO',
            'KISS',
            'DRY',
            'Modular Architecture',
        ],
    },

    {
        key: 'tools',
        technologies: [
            'PHPStorm',
            'Postman',
            'Figma',
            'MS Office',
            'Codex',
            'ChatGPT',
            'GitHub Copilot',
        ],
    },
];