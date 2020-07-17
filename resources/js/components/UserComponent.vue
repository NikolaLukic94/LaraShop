<template>
  <div>
    <div class="container">
        {{ getUser.email }}
    </div>
  </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    export default {
        name: 'user-profile-component',
        computed: {
            ...mapGetters(
                'user', ['getUser'])
        },
        methods: {
            ...mapActions(
                'user', ['setUser']),
        },
        created() {
            this.setUser();
        },             
    }
</script>
