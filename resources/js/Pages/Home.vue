<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';

defineProps({
    platformName: {
        type: String,
        required: true,
    },
});

const page = usePage();

const logoutForm = useForm({});
</script>

<template>
    <Head :title="`${platformName} Dashboard`" />

    <div class="min-h-screen bg-transparent text-slate-950">
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col px-6 py-8 lg:px-10">
            <header class="flex items-center justify-between rounded-[2rem] border border-black/5 bg-white/75 px-6 py-4 shadow-[0_20px_60px_rgba(15,23,42,0.08)] backdrop-blur">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.35em] text-sky-600">
                        Internal demand intelligence
                    </p>
                    <h1 class="mt-2 text-2xl font-semibold tracking-tight text-slate-950">
                        {{ platformName }}
                    </h1>
                </div>

                <div class="flex items-center gap-4">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm text-slate-500">Signed in as</p>
                        <p class="font-medium text-slate-900">{{ page.props.auth.user.name }}</p>
                    </div>

                    <button
                        class="rounded-full border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-slate-900 hover:text-slate-950"
                        type="button"
                        @click="logoutForm.post('/logout')"
                    >
                        Log out
                    </button>
                </div>
            </header>

            <main class="grid flex-1 gap-6 py-8 lg:grid-cols-[1.3fr_0.7fr]">
                <section class="overflow-hidden rounded-[2rem] bg-slate-950 px-8 py-10 text-white shadow-[0_30px_80px_rgba(15,23,42,0.16)]">
                    <p class="text-sm uppercase tracking-[0.32em] text-sky-300">Forecasting workspace</p>
                    <h2 class="mt-5 max-w-2xl text-4xl font-semibold tracking-tight sm:text-5xl">
                        Predict ride demand using calendar signals, temporal patterns, and live events.
                    </h2>
                    <p class="mt-6 max-w-2xl text-base leading-8 text-slate-300 sm:text-lg">
                        RideQ gives internal operations teams one place to explore when, where, and why ride demand
                        shifts across the network before those surges hit supply.
                    </p>

                    <div class="mt-10 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Calendar features</p>
                            <p class="mt-3 text-2xl font-semibold">Holidays</p>
                            <p class="mt-2 text-sm text-slate-300">Seasonality, public holidays, school cycles.</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Temporal profiles</p>
                            <p class="mt-3 text-2xl font-semibold">Peak windows</p>
                            <p class="mt-2 text-sm text-slate-300">Commuter curves, weekends, rush-hour swings.</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                            <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Event impact</p>
                            <p class="mt-3 text-2xl font-semibold">Local surges</p>
                            <p class="mt-2 text-sm text-slate-300">Concerts, sports, and citywide event demand spikes.</p>
                        </div>
                    </div>
                </section>

                <aside class="rounded-[2rem] border border-black/5 bg-white/80 p-8 shadow-[0_20px_60px_rgba(15,23,42,0.08)] backdrop-blur">
                    <p class="text-sm font-semibold uppercase tracking-[0.32em] text-amber-600">Current scope</p>
                    <h3 class="mt-4 text-2xl font-semibold tracking-tight text-slate-950">
                        Authentication first
                    </h3>
                    <p class="mt-4 text-base leading-7 text-slate-600">
                        Users will be seeded initially, with user management landing in a later phase. This dashboard is
                        now protected behind a simple internal login.
                    </p>

                    <dl class="mt-8 space-y-5">
                        <div>
                            <dt class="text-sm font-medium text-slate-500">Access model</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-950">Email and password login only</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500">Registration</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-950">Disabled for now</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-slate-500">Next step</dt>
                            <dd class="mt-1 text-base font-semibold text-slate-950">Seed internal users and roles</dd>
                        </div>
                    </dl>
                </aside>
            </main>
        </div>
    </div>
</template>
