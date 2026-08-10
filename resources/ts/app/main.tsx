import { StrictMode } from 'react';
import { createRoot } from 'react-dom/client';

import App from './App';
import { getBootstrap } from '@/api/bootstrapApi';
import BootstrapService from '@/services/BootstrapService';

import '@/assets/styles/app.scss';

const container = document.getElementById('app');

if (!container) {
    throw new Error('Root element #app not found');
}

async function bootstrapApplication() {
    const bootstrap = await getBootstrap();

    BootstrapService.set(bootstrap);

    createRoot(container).render(
        <StrictMode>
            <App />
        </StrictMode>
    );
}

bootstrapApplication().catch((error) => {
    console.error('Application bootstrap failed:', error);

    container.innerHTML = `
        <div class="app-bootstrap-error">
            Failed to initialize application.
        </div>
    `;
});