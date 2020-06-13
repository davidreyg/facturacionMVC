<template>
  <q-layout view="hHh LpR fff">
    <app-header :left="left" @left-drawer="isleftDrawer"></app-header>
    <app-left-drawer :left="left"></app-left-drawer>

    <q-page-container>
      <div class="q-pa-md">
        <router-view></router-view>
      </div>
    </q-page-container>

    <app-footer></app-footer>
  </q-layout>
</template>

<script>
// import AppRightDrawer from './AppRightDrawer'
import AppLeftDrawer from './partials/AppLeftDrawer'
import AppHeader from './partials/AppHeader'
import AppFooter from './partials/AppFooter'
export default {
  name: 'MainLayout',
  components: { AppHeader, AppFooter, AppLeftDrawer },
  data() {
    return {
      left: false,
      miniState: false
    }
  },
  methods: {
    isleftDrawer(data) {
      this.left = data
    }
  }
}
</script>
