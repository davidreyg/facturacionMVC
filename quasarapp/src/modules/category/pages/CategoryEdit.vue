<template>
  <div>
    <q-card>
      <q-card-section class="q-pa-none">
        <div class="row wrap">
          <div class="col col-12 items-center q-pa-none">
            <edit-form></edit-form>
          </div>
        </div>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>
import EditForm from '../components/EditForm'
export default {
  components: { EditForm }
}
</script>

<style></style>
