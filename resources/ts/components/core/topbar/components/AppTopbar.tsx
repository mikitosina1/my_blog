import LanguageSwitcher from "./LanguageSwitcher";
import ThemeSwitcher from "./ThemeSwitcher";
import UserMenu from "./UserMenu";

export default function AppTopbar() {
    return (
        <header className="app-topbar">
            <div className="app-topbar__left">
                <button className="sidebar-toggle" />
                <div className="breadcrumbs">
                    Dashboard
                </div>
            </div>

            <div className="app-topbar__right">
                <LanguageSwitcher />
                <ThemeSwitcher />
                <UserMenu />
            </div>
        </header>
    );
}
