<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-100">
            <div class="w-full bg-gray-700 h-6"></div>
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <m-nav-link
                        href="/dashboard"
                        :active="$page.currentRouteName == 'dashboard'"
                        icon="tachometer-alt"
                        v-if="! $page.user.is_teacher"
                    >
                    </m-nav-link>
                    <m-nav-link
                        href="/tasks"
                        :active="$page.currentRouteName == 'tasks.index'"
                        icon="tasks"
                        v-if="$page.user.is_teacher"
                    >
                    </m-nav-link>
                    <m-nav-link
                        href="/community"
                        :active="$page.currentRouteName == 'community'"
                        icon="users"
                        v-if="! $page.user.is_teacher"
                    >
                    </m-nav-link>
                    <m-nav-link
                        href="/user/profile"
                        :active="$page.currentRouteName == 'profile.show'"
                        icon="user"
                    >
                    </m-nav-link>
                    <form @submit.prevent="logout" class="h-full">
                        <button type="submit" class="h-full">
                            <font-awesome-icon icon="sign-out-alt" size="3x"></font-awesome-icon>
                        </button>

                    </form>

                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                <slot name="header"></slot>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <slot></slot>
        </main>

        <!-- Modal Portal -->
        <portal-target name="modal" multiple></portal-target>
    </div>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";
import JetApplicationMark from "./../Jetstream/ApplicationMark";
import JetDropdown from "./../Jetstream/Dropdown";
import JetDropdownLink from "./../Jetstream/DropdownLink";
import JetNavLink from "./../Jetstream/NavLink";
import JetResponsiveNavLink from "./../Jetstream/ResponsiveNavLink";
import MNavLink from "../Components/MNavLink";

export default {
    components: {
        JetApplicationLogo,
        JetApplicationMark,
        JetDropdown,
        JetDropdownLink,
        JetNavLink,
        JetResponsiveNavLink,
        MNavLink
    },

    data() {
        return {
            showingNavigationDropdown: false,
        };
    },

    methods: {
        switchToTeam(team) {
            this.$inertia.put(
                "/current-team",
                {
                    team_id: team.id,
                },
                {
                    preserveState: false,
                }
            );
        },

        logout() {
            axios.post("/logout").then((response) => {
                window.location = "/";
            });
        },
    },

    computed: {
        path() {
            return window.location.pathname;
        },
    },
};
</script>
