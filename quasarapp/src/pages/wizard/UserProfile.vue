<template>
  <div class="row fit">
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="text-h5 text-bold">
        {{ $t("wizard.account_info") }}
      </div>
      <q-separator spaced />
      <div>{{ $t("wizard.account_info_desc") }}</div>
    </div>

    <div class="col-12 q-pt-md">
      <ValidationObserver ref="observer">
        <form @submit.prevent="next">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-sm">
              <ValidationProvider
                rules="required"
                :name="labelName"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  dense
                  v-model.trim="profileData.name"
                  type="text"
                  :label="labelName"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-sm">
              <ValidationProvider
                rules="required"
                :name="labelEmail"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  dense
                  v-model.trim="profileData.email"
                  type="text"
                  :label="labelEmail"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-sm">
              <ValidationProvider
                rules="required"
                :name="labelPassword"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  outlined
                  dense
                  v-model.trim="profileData.password"
                  type="text"
                  :label="labelPassword"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 q-pa-sm">
              <ValidationProvider
                :rules="ruleSamePassword"
                :name="labelConfirmPassword"
                v-slot="{ errors, invalid, validated }"
              >
                <q-input
                  dense
                  outlined
                  v-model.trim="profileData.confirm_password"
                  type="text"
                  :label="labelConfirmPassword"
                  :error="invalid && validated"
                  :error-message="errors[0]"
                >
                </q-input>
              </ValidationProvider>
            </div>
            <div class="col-12 q-pt-xl">
              <q-btn
                color="primary"
                icon="save"
                type="submit"
                :loading="loading"
              >
                {{ $t("wizard.save_cont") }}
              </q-btn>
            </div>
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "UserProfile",
  data() {
    return {
      profileData: {
        name: null,
        email: null,
        password: null,
        confirm_password: null
      },
      loading: false
    };
  },
  computed: {
    labelProfilePicture() {
      return this.$t("settings.account_settings.profile_picture");
    },
    labelName() {
      return this.$t("wizard.name");
    },
    labelEmail() {
      return this.$t("wizard.email");
    },
    labelPassword() {
      return this.$t("wizard.password");
    },
    labelConfirmPassword() {
      return this.$t("wizard.confirm_password");
    },
    ruleSamePassword() {
      return `required|is:${this.profileData.password}`;
    }
  }
};
</script>

<style>
</style>
