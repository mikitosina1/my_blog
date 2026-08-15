import {CircleUserRound, House,} from 'lucide-react';

export const iconRegistry = {
    home: House,
    about: CircleUserRound,
} as const;

export type IconName = keyof typeof iconRegistry;