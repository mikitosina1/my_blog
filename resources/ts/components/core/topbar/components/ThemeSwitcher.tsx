import IconButton from '@/components/ui/IconButton';
import { Moon } from 'lucide-react';

export default function ThemeSwitcher() {
    return (
        <IconButton
            aria-label="Switch theme"
            title="Switch theme"
        >
            <Moon size={18} />
        </IconButton>
    );
}
