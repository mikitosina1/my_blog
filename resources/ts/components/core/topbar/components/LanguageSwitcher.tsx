import Dropdown from '@/components/ui/Dropdown';
import IconButton from '@/components/ui/IconButton';

import { Globe } from 'lucide-react';
import { languages } from '@/config/languages';

export default function LanguageSwitcher() {

    return (
        <Dropdown
            trigger={
                <IconButton aria-label="Language">
                    <Globe size={18} />
                </IconButton>
            }
        >
            {languages.map(language => (
                <button
                    key={language.code}
                    className="dropdown__item"
                >
                    {language.name}
                </button>
            ))}
        </Dropdown>
    );
}
