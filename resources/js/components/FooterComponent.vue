<template>
<v-app class="pt-1 mt-1">
<v-footer absolute
      v-bind="localAttrs"
      :padless="padless"
    >
      <v-card
        flat
        tile
        width="100%"
        class="teal lighten-2 text-center"
      >
        <v-card-text>
          <v-btn
            v-for="icon in icons"
            :key="icon"
            class="mx-4"
            icon
          >
            <v-icon size="24px" color="white">
              {{ icon }}
            </v-icon>
          </v-btn>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-text class="white--text">
          {{ new Date().getFullYear() }} — <strong>Developed by Nikola Lukic</strong>
        </v-card-text>
      </v-card>
    </v-footer>

</v-app>
  
</template>


<script>
    export default {
        name: 'footer-component',
        computed: {
            localAttrs () {
                const attrs = {}

                if (this.variant === 'default') {
                attrs.absolute = false
                attrs.fixed = false
                } else {
                attrs[this.variant] = true
                }
                return attrs
            },
        },
        data: () => ({
            padless: false,
            variant: 'default',
            icons: [
                'mdi-home',
                'mdi-email',
                'mdi-calendar',
                'mdi-delete',
                ],
            })
        }
    
</script>
