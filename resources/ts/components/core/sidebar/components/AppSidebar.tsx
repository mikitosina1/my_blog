import Logo from "@/components/core/sidebar/components/logo/Logo";
import Sidebar from "./Sidebar";

export default function AppSidebar() {
    return (
        <aside className="app-sidebar">
            <header className="app-sidebar__header">
                <Logo/>
            </header>

            <nav
                className="app-sidebar__navigation"
                aria-label="Main navigation"
            >
                <Sidebar/>
            </nav>

            <footer className="app-sidebar__footer">

            </footer>
        </aside>
    );
}
