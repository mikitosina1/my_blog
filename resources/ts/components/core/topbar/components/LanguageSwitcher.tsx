import Dropdown from '@/components/ui/Dropdown';
import IconButton from '@/components/ui/IconButton';

import { Globe } from 'lucide-react';

import { languages } from '@/config/languages';

export default function LanguageSwitcher() {
    const switchLanguage = (locale: string) => {
        const currentPath = [
            window.location.pathname,
            window.location.search,
            window.location.hash,
        ].join('');

        window.location.href = `/lang/${locale}?redirect=${encodeURIComponent(currentPath)}`;
    };

    return (
        <Dropdown
            trigger={
                <IconButton
                    type="button"
                    aria-label="Language"
                    title="Language"
                >
                    <Globe size={18} />
                </IconButton>
            }
        >
            {languages.map(language => (
                <button
                    key={language.code}
                    type="button"
                    className="dropdown__item"
                    onClick={() => switchLanguage(language.code)}
                >
                    {language.name}
                </button>
            ))}
        </Dropdown>
    );
}
