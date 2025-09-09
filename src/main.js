import { initDatabase } from './database.js';
import { renderAlimentos } from './components/alimentos.js';
import { renderPorcoes } from './components/porcoes.js';

// Inicializar banco de dados
initDatabase();

// Router simples
function router() {
    const hash = window.location.hash || '#alimentos';
    const app = document.getElementById('app');
    
    // Header
    app.innerHTML = `
        <nav class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold">Sistema de Alimentos</h1>
                <div class="space-x-4">
                    <a href="#alimentos" class="hover:underline ${hash === '#alimentos' ? 'font-bold' : ''}">Alimentos</a>
                    <a href="#porcoes" class="hover:underline ${hash === '#porcoes' ? 'font-bold' : ''}">Porções</a>
                </div>
            </div>
        </nav>
        <div id="content" class="container mx-auto p-4"></div>
    `;
    
    const content = document.getElementById('content');
    
    switch(hash) {
        case '#alimentos':
            renderAlimentos(content);
            break;
        case '#porcoes':
            renderPorcoes(content);
            break;
        default:
            renderAlimentos(content);
    }
}

// Event listeners
window.addEventListener('hashchange', router);
window.addEventListener('load', router);