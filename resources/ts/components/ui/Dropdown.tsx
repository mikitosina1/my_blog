import {
    ReactNode,
    useEffect,
    useId,
    useRef,
    useState,
} from 'react';

interface DropdownProps {
    trigger: ReactNode;
    children: ReactNode;
}

export default function Dropdown({
                                     trigger,
                                     children,
                                 }: DropdownProps) {
    const [opened, setOpened] = useState(false);

    const ref = useRef<HTMLDivElement>(null);
    const contentId = useId();

    useEffect(() => {
        if (!opened) {
            return;
        }

        const handleClickOutside = (event: MouseEvent) => {
            if (
                ref.current &&
                !ref.current.contains(event.target as Node)
            ) {
                setOpened(false);
            }
        };

        const handleEscape = (event: KeyboardEvent) => {
            if (event.key === 'Escape') {
                setOpened(false);
            }
        };

        document.addEventListener(
            'mousedown',
            handleClickOutside
        );

        document.addEventListener(
            'keydown',
            handleEscape
        );

        return () => {
            document.removeEventListener(
                'mousedown',
                handleClickOutside
            );

            document.removeEventListener(
                'keydown',
                handleEscape
            );
        };
    }, [opened]);

    return (
        <div
            ref={ref}
            className="dropdown"
        >
            <div
                className="dropdown__trigger"
                aria-controls={contentId}
                aria-expanded={opened}
                onClick={() => setOpened(current => !current)}
            >
                {trigger}
            </div>

            {opened && (
                <div
                    id={contentId}
                    className="dropdown__content dropdown__content--open"
                >
                    {children}
                </div>
            )}
        </div>
    );
}