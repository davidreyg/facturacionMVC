<template>
  <div>
    <router-view />
  </div>
</template>

<script>
export default {
  name: "LayoutWizard",

  mounted() {
    this.setLayoutBackground();
  },

  destroyed() {
    document.body.style.backgroundColor = "#EBF1FA";
  },

  methods: {
    setLayoutBackground() {
      document.body.style.backgroundColor = "#f9fbff";
    }
  }
};
</script>
