import LanguageSwitcher from "@/components/core/topbar/components/LanguageSwitcher";
import ThemeSwitcher from "@/components/core/topbar/components/ThemeSwitcher";
import UserMenu from "@/components/core/topbar/components/UserMenu";

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
