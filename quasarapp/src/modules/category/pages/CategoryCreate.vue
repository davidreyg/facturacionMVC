<template>
  <div>
    <q-card>
      <q-card-section class="q-pa-none">
        <div class="row wrap">
          <div class="col col-12 items-center q-pa-none">
            <create-form></create-form>
          </div>
        </div>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>
import CreateForm from '../components/CreateForm';

export default {
  components: {CreateForm}
}
</script>

<style></style>
