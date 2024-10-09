<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>

    <Head title="API de Teste Laravel" />
    <div
        class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex items-center justify-center">
        <div class="max-w-2xl px-6 py-10 bg-white rounded-lg shadow-lg dark:bg-gray-800 text-center">
            <h1 class="text-2xl font-bold text-black dark:text-white mb-4">Bem-vindo à API de Teste Laravel</h1>
            <p class="mb-6">Este projeto foi desenvolvido como parte do teste técnico para a
                4Juris. Utilize as credenciais criadas pelo seeder para acessar a API.</p>

            <div class="mb-6">
                <Link :href="route('login')"
                    class="inline-block px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="inline-block px-4 py-2 ml-4 text-white bg-green-500 rounded hover:bg-green-700">
                Register
                </Link>
            </div>

            <h2 class="text-xl font-semibold text-black dark:text-white mb-2">Informações sobre o Projeto</h2>
            <h3 class="text-lg font-semibold mb-4">Repositório: <a class="text-blue-500" 
                    href="https://github.com/leolucasguedes/laravel-manager">Manager Laravel</a></h3>
            <p class="text-sm mb-4">
                A API foi desenvolvida com Laravel e utiliza autenticação via tokens com Sanctum. Para acessar as rotas
                protegidas, faça login e obtenha seu token de acesso.
            </p>

            <div class="text-left">
                <h3 class="text-lg font-semibold">Endpoints disponíveis:</h3>
                <ul class="list-disc ml-6 mt-2 text-sm">
                    <li><strong>POST</strong> /api/login - Realiza o login e retorna um token</li>
                    <li><strong>POST</strong> /api/logout - Realiza o logout do usuário autenticado</li>
                    <li><strong>POST</strong> /api/usuarios - Criação de novos usuários</li>
                    <li><strong>GET</strong> /api/usuarios - Listagem de todos os usuários da mesma empresa</li>
                    <li><strong>GET</strong> /api/usuarios/{id} - Exibe detalhes de um usuário específico</li>
                    <li><strong>PUT</strong> /api/usuarios/{id} - Atualiza informações de um usuário específico</li>
                    <li><strong>DELETE</strong> /api/usuarios/{id} - Remove um usuário específico</li>

                    <li><strong>POST</strong> /api/empresas - Criação de uma nova empresa</li>
                    <li><strong>GET</strong> /api/empresas - Listagem de todas as empresas</li>
                    <li><strong>GET</strong> /api/empresas/{id} - Exibe detalhes de uma empresa específica</li>
                    <li><strong>PUT</strong> /api/empresas/{id} - Atualiza informações de uma empresa específica</li>
                    <li><strong>DELETE</strong> /api/empresas/{id} - Remove uma empresa específica</li>

                    <li><strong>POST</strong> /api/clientes - Criação de um novo cliente</li>
                    <li><strong>GET</strong> /api/clientes - Listagem de todos os clientes da mesma empresa</li>
                    <li><strong>GET</strong> /api/clientes/{id} - Exibe detalhes de um cliente específico</li>
                    <li><strong>PUT</strong> /api/clientes/{id} - Atualiza informações de um cliente específico</li>
                    <li><strong>DELETE</strong> /api/clientes/{id} - Remove um cliente específico</li>
                </ul>
            </div>

            <footer class="mt-10 text-sm text-gray-500 dark:text-gray-400">
                Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
            </footer>
        </div>
    </div>
</template>
