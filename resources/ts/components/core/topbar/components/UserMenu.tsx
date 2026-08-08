import Dropdown from '@/components/ui/Dropdown';

import IconButton from '@/components/ui/IconButton';

import { CircleUser } from 'lucide-react';

import tr from '@/services/TranslationService';

export default function UserMenu() {
    return (
        <Dropdown
            trigger={
                <IconButton aria-label="User">
                    <CircleUser size={18} />
                </IconButton>
            }
        >
            <button className="dropdown__item">
                {tr.t('user_cloud.profile')}
            </button>
            <button className="dropdown__item">
                {tr.t('user_cloud.settings')}
            </button>
            <button className="dropdown__item">
                {tr.t('user_cloud.logout')}
            </button>
        </Dropdown>
    );
}
