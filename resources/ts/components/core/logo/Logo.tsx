import './logo.scss';

import LogoSvg from './logo.svg';

interface LogoProps {
    compact?: boolean;
    href?: string;
}

export default function Logo({
                                 compact = false,
                                 href = '/',
                             }: LogoProps) {

    const content = (
        <div className={`app-logo ${compact ? 'app-logo--compact' : ''}`}>
            <img
                src={LogoSvg}
                alt="MIK Platform"
                className="app-logo__image"
            />

            {!compact && (
                <div className="app-logo__text">
                    <span className="app-logo__title">
                        Build • Learn • Share
                    </span>
                </div>
            )}
        </div>
    );

    return (
        <a
            href={href}
            className="app-logo__link"
        >
            {content}
        </a>
    );
}
