import tr from "@/services/TranslationService";

export default function UserMenu() {
    return (
        <div className="user-menu">
            <button
                type="button"
                className="user-menu__button"
            >
                👤
            </button>
            <div className="user-menu__dropdown">
                <button type="button">
                    {tr.t('user_cloud.profile')}
                </button>

                <button type="button">
                    {tr.t('user_cloud.settings')}
                </button>

                <button type="button">
                    {tr.t('user_cloud.logout')}
                </button>
            </div>
        </div>
    );
}
