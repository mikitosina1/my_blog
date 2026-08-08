import {
    ReactNode,
    useEffect,
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

    useEffect(() => {
        function handleClick(event: MouseEvent) {
            if (
                ref.current &&
                !ref.current.contains(event.target as Node)
            ) {
                setOpened(false);
            }
        }
        document.addEventListener('mousedown', handleClick);
        return () => {
            document.removeEventListener('mousedown', handleClick);
        };
    }, []);

    return (
        <div
            className="dropdown"
            ref={ref}
        >
            <div
                aria-expanded={opened}
                onClick={() => setOpened(!opened)}
            >
                {trigger}
            </div>
            {opened && (
                <div className="dropdown__content dropdown__content--open">
                    {children}
                </div>
            )}
        </div>
    );
}
