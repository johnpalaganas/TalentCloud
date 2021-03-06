import { localizedField, localizedFieldNonNull } from "../models/app";

export type Locales = "en" | "fr";
type TranslatableKeysNonNull<T> = {
  [K in keyof T]: T[K] extends localizedFieldNonNull ? K : never;
}[keyof T];
type TranslatableKeys<T> = {
  [K in keyof T]: T[K] extends localizedField ? K : never;
}[keyof T];

export function localizeField<T>(
  locale: Locales,
  model: T,
  field: TranslatableKeys<T>,
): string | null {
  if (model[field] !== null) {
    return model[field][locale];
  }
  return null;
}
export function localizeFieldNonNull<T>(
  locale: Locales,
  model: T,
  field: TranslatableKeysNonNull<T>,
): string {
  return model[field][locale];
}

export function getLocale(locale: string): Locales {
  if (locale === "en" || locale === "fr") {
    return locale;
  }
  console.log("Warning: unknown locale. Defaulting to en.");
  return "en";
}
