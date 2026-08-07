import { languages } from "@/config/languages";

export default function LanguageSwitcher() {
    return (
        <div className="language-switcher">

            <button
                type="button"
                className="language-switcher__button"
            >
                🌍
            </button>

            <div className="language-switcher__dropdown">

                {languages.map(language => (
                    <button
                        key={language.code}
                        type="button"
                        className="language-switcher__item"
                    >
                        {language.label}
                    </button>
                ))}

            </div>

        </div>
    );
}