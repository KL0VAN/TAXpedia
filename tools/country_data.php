<?php
declare(strict_types=1);

/**
 * TAXpedia centralized comparison data — checked 2026-09-30.
 * Backward-compatible schema v2: metrics remain scalar values.
 * Added metadata does NOT automatically update frontend labels or notes.
 * Display periods, definitions and the NL salary exception in the comparator.
 * All salaries are nominal EUR/year, including non-euro countries.
 * Missing comparable salary for NL is null, never zero.
 * Taxation type concerns ordinary resident EMPLOYMENT income only.
 * New flag paths require an asset check; no new country-page links are invented.
 */

return [
  'schema_version' => 2,
  'metrics' => [
    [
      'key' => 'valuta',
      'label_key' => 'valuta',
      'fmt' => 'text',
      'label_it' => 'Valuta',
      'label_en' => 'Currency',
      'period' => '2026-09-30',
    ],
    [
      'key' => 'reddito_medio',
      'label_key' => 'reddito_medio',
      'unit_key' => 'unit_eur_year',
      'fmt' => 'eur0',
      'label_it' => 'Retribuzione lorda annua media (tempo pieno equivalente)',
      'label_en' => 'Average gross annual salary (full-time adjusted)',
      'period' => '2024',
    ],
    [
      'key' => 'inflation_rate',
      'label_key' => 'inflation_rate',
      'unit_key' => 'unit_pct',
      'fmt' => 'pct1',
      'label_it' => 'Inflazione IPCA (variazione annua)',
      'label_en' => 'HICP inflation (annual rate)',
      'period' => '2026-08',
    ],
    [
      'key' => 'taxation_type',
      'label_key' => 'taxation_type',
      'fmt' => 'translated_text',
      'label_it' => 'Imposta sul reddito da lavoro: struttura ordinaria',
      'label_en' => 'Employment income tax: standard structure',
      'period' => '2026',
    ],
    [
      'key' => 'debt_gdp',
      'label_key' => 'debt_gdp',
      'unit_key' => 'unit_pct',
      'fmt' => 'pct1',
      'label_it' => 'Debito pubblico / PIL',
      'label_en' => 'Government debt / GDP',
      'period' => '2026-Q1',
    ],
    [
      'key' => 'unemployment_rate',
      'label_key' => 'unemployment_rate',
      'unit_key' => 'unit_pct',
      'fmt' => 'pct1',
      'label_it' => 'Disoccupazione (destagionalizzata)',
      'label_en' => 'Unemployment (seasonally adjusted)',
      'period' => '2026-07',
    ],
  ],
  'countries' => [
    'IT' => [
      'slug' => 'italy',
      'name_it' => 'Italia',
      'name_en' => 'Italy',
      'flag_path' => '/imm/flags/it.png',
      'calculator_path' => '/calculator/italia/italia.php',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 33523,
        'inflation_rate' => 3.2,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 138.9,
        'unemployment_rate' => 5.8,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/italy/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'FR' => [
      'name_it' => 'Francia',
      'name_en' => 'France',
      'flag_path' => '/imm/flags/fr.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 43790,
        'inflation_rate' => 2.6,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 117.6,
        'unemployment_rate' => 8.3,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/france/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'DE' => [
      'name_it' => 'Germania',
      'name_en' => 'Germany',
      'flag_path' => '/imm/flags/de.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 53791,
        'inflation_rate' => 2.9,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 64.4,
        'unemployment_rate' => 4.0,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/germany/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'ES' => [
      'name_it' => 'Spagna',
      'name_en' => 'Spain',
      'flag_path' => '/imm/flags/es.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 33700,
        'inflation_rate' => 4.6,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 101.6,
        'unemployment_rate' => 10.0,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/spain/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'BE' => [
      'name_it' => 'Belgio',
      'name_en' => 'Belgium',
      'flag_path' => '/imm/flags/be.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 59632,
        'inflation_rate' => 4.2,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 109.1,
        'unemployment_rate' => 6.0,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/belgium/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'LU' => [
      'name_it' => 'Lussemburgo',
      'name_en' => 'Luxembourg',
      'flag_path' => '/imm/flags/lu.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 82969,
        'inflation_rate' => 4.0,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 29.2,
        'unemployment_rate' => 7.1,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/luxembourg/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'NL' => [
      'name_it' => 'Paesi Bassi',
      'name_en' => 'Netherlands',
      'flag_path' => '/imm/flags/nl.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => null,
        'inflation_rate' => 2.8,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 43.8,
        'unemployment_rate' => 4.0,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/netherlands/individual/taxes-on-personal-income',
        ],
        'reddito_medio' => [
          'period' => '2024',
          'status' => 'not_available_in_comparable_series',
          'source_url' => 'https://ec.europa.eu/eurostat/cache/metadata/en/nama_10_fte_esms.htm',
          'note_it' => 'Paesi Bassi esclusi dalla serie Eurostat nama_10_fte: metodologia nazionale diversa. Non sostituire con una cifra non omogenea.',
          'note_en' => 'Netherlands excluded from Eurostat nama_10_fte because the national methodology differs. No non-comparable value substituted.',
        ],
      ],
    ],
    'AT' => [
      'name_it' => 'Austria',
      'name_en' => 'Austria',
      'flag_path' => '/imm/flags/at.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 58600,
        'inflation_rate' => 2.9,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 83.3,
        'unemployment_rate' => 6.2,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/austria/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'HR' => [
      'name_it' => 'Croazia',
      'name_en' => 'Croatia',
      'flag_path' => '/imm/flags/hr.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 23446,
        'inflation_rate' => 3.7,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 58.4,
        'unemployment_rate' => 4.3,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/croatia/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'PL' => [
      'name_it' => 'Polonia',
      'name_en' => 'Poland',
      'flag_path' => '/imm/flags/pl.png',
      'metrics' => [
        'valuta' => 'PLN',
        'reddito_medio' => 21246,
        'inflation_rate' => 3.5,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 61.6,
        'unemployment_rate' => 3.4,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/poland/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'PT' => [
      'name_it' => 'Portogallo',
      'name_en' => 'Portugal',
      'flag_path' => '/imm/flags/pt.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 24818,
        'inflation_rate' => 3.6,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 91.0,
        'unemployment_rate' => 5.7,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/portugal/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'SI' => [
      'name_it' => 'Slovenia',
      'name_en' => 'Slovenia',
      'flag_path' => '/imm/flags/si.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 35133,
        'inflation_rate' => 3.4,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 64.8,
        'unemployment_rate' => 3.5,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/slovenia/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'BG' => [
      'name_it' => 'Bulgaria',
      'name_en' => 'Bulgaria',
      'flag_path' => '/calculator/bulgaria/flagbulgaria.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 15387,
        'inflation_rate' => 5.0,
        'taxation_type' => 'flat_taxation',
        'debt_gdp' => 28.5,
        'unemployment_rate' => 3.6,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/bulgaria/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'CZ' => [
      'name_it' => 'Cechia',
      'name_en' => 'Czechia',
      'flag_path' => '/calculator/czech/flagczech.png',
      'metrics' => [
        'valuta' => 'CZK',
        'reddito_medio' => 23998,
        'inflation_rate' => 1.5,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 44.1,
        'unemployment_rate' => 3.3,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/czech-republic/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'DK' => [
      'name_it' => 'Danimarca',
      'name_en' => 'Denmark',
      'flag_path' => '/calculator/denmark/flagdenmark.png',
      'metrics' => [
        'valuta' => 'DKK',
        'reddito_medio' => 71565,
        'inflation_rate' => 2.0,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 26.8,
        'unemployment_rate' => 6.7,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/denmark/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'GR' => [
      'name_it' => 'Grecia',
      'name_en' => 'Greece',
      'flag_path' => '/calculator/greece/flaggreece.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 17954,
        'inflation_rate' => 3.7,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 143.5,
        'unemployment_rate' => 7.9,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/greece/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'HU' => [
      'name_it' => 'Ungheria',
      'name_en' => 'Hungary',
      'flag_path' => '/calculator/hungary/flaghungary.png',
      'metrics' => [
        'valuta' => 'HUF',
        'reddito_medio' => 18461,
        'inflation_rate' => 1.8,
        'taxation_type' => 'flat_taxation',
        'debt_gdp' => 77.7,
        'unemployment_rate' => 4.5,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/hungary/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'IE' => [
      'name_it' => 'Irlanda',
      'name_en' => 'Ireland',
      'flag_path' => '/calculator/ireland/flagireland.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 61051,
        'inflation_rate' => 3.4,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 37.0,
        'unemployment_rate' => 5.1,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/ireland/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'RO' => [
      'name_it' => 'Romania',
      'name_en' => 'Romania',
      'flag_path' => '/calculator/romania/flagromania.png',
      'metrics' => [
        'valuta' => 'RON',
        'reddito_medio' => 21108,
        'inflation_rate' => 6.3,
        'taxation_type' => 'flat_taxation',
        'debt_gdp' => 60.1,
        'unemployment_rate' => 6.4,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/romania/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'SE' => [
      'name_it' => 'Svezia',
      'name_en' => 'Sweden',
      'flag_path' => '/calculator/sweden/flagsweden.png',
      'metrics' => [
        'valuta' => 'SEK',
        'reddito_medio' => 46525,
        'inflation_rate' => 0.3,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 34.9,
        'unemployment_rate' => 8.7,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/sweden/individual/taxes-on-personal-income',
        ],
      ],
    ],
    'EE' => [
      'name_it' => 'Estonia',
      'name_en' => 'Estonia',
      'flag_path' => '/calculator/estonia/flagestonia.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 26546,
        'inflation_rate' => 1.3,
        'taxation_type' => 'flat_taxation',
        'debt_gdp' => 25.2,
        'unemployment_rate' => 6.9,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/estonia/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
    'CY' => [
      'name_it' => 'Cipro',
      'name_en' => 'Cyprus',
      'flag_path' => '/calculator/cyprus/flagcyprus.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 27611,
        'inflation_rate' => 5.2,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 54.6,
        'unemployment_rate' => 3.9,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/cyprus/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
    'LV' => [
      'name_it' => 'Lettonia',
      'name_en' => 'Latvia',
      'flag_path' => '/calculator/latvia/flaglatvia.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 22262,
        'inflation_rate' => 3.0,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 46.9,
        'unemployment_rate' => 7.3,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/latvia/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
    'LT' => [
      'name_it' => 'Lituania',
      'name_en' => 'Lithuania',
      'flag_path' => '/calculator/lithuania/flaglithuania.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 29104,
        'inflation_rate' => 5.6,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 42.3,
        'unemployment_rate' => 6.2,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/lithuania/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
    'MT' => [
      'name_it' => 'Malta',
      'name_en' => 'Malta',
      'flag_path' => '/calculator/malta/flagmalta.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 33499,
        'inflation_rate' => 2.0,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 45.9,
        'unemployment_rate' => 3.5,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/malta/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
    'SK' => [
      'name_it' => 'Slovacchia',
      'name_en' => 'Slovakia',
      'flag_path' => '/calculator/slovakia/flagslovakia.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 20287,
        'inflation_rate' => 3.1,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 62.5,
        'unemployment_rate' => 5.7,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/slovak-republic/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
    'FI' => [
      'name_it' => 'Finlandia',
      'name_en' => 'Finland',
      'flag_path' => '/calculator/finland/flagfinland.png',
      'metrics' => [
        'valuta' => 'EUR',
        'reddito_medio' => 49428,
        'inflation_rate' => 2.4,
        'taxation_type' => 'progressive_taxation',
        'debt_gdp' => 89.7,
        'unemployment_rate' => 10.5,
      ],
      'metric_meta' => [
        'taxation_type' => [
          'checked_on' => '2026-09-30',
          'scope' => 'resident_employment_income_standard_regime',
          'source_url' => 'https://taxsummaries.pwc.com/finland/individual/taxes-on-personal-income',
        ],
      ],
      'asset_note' => 'flag_path follows existing /imm/flags convention; verify this image exists before deployment.',
    ],
  ],
  'updated_at' => '2026-09-30',
  'metric_metadata' => [
    'valuta' => [
      'as_of' => '2026-09-30',
      'source_id' => 'eurostat_debt',
      'note_it' => 'Valuta in uso alla data di verifica; Bulgaria in euro dal 1 gennaio 2026.',
    ],
    'reddito_medio' => [
      'period' => '2024',
      'source_id' => 'eurostat_salary',
      'dataset' => 'nama_10_fte',
      'unit' => 'EUR/year',
      'definition_it' => 'Retribuzione lorda annua media per dipendente, corretta per il tempo pieno. Non è reddito disponibile, reddito mediano o reddito medio di tutti i residenti. Valori in euro nominali, non corretti per il potere di acquisto.',
      'definition_en' => 'Average gross annual salary per employee, full-time adjusted. Not disposable income, median income or average income of all residents. Nominal euros, not purchasing-power adjusted.',
      'coverage_note' => '26 EU countries. NL is null due to a different national methodology.',
      'retrieval_sources' => [
        'eurostat_salary',
        'dbnomics_salary',
        'salary_republication',
      ],
    ],
    'inflation_rate' => [
      'period' => '2026-08',
      'source_id' => 'eurostat_inflation',
      'dataset' => 'prc_hicp_minr',
      'unit' => 'percent',
      'definition_it' => 'IPCA complessivo: variazione percentuale rispetto allo stesso mese dell’anno precedente. Non media annua né variazione mensile.',
      'definition_en' => 'All-items HICP: percentage change against the same month of the previous year; not annual-average or month-on-month inflation.',
    ],
    'debt_gdp' => [
      'period' => '2026-Q1',
      'source_id' => 'eurostat_debt',
      'dataset' => 'gov_10q_ggdebt',
      'unit' => 'percent_of_GDP',
      'status' => 'provisional',
      'definition_it' => 'Debito lordo consolidato delle amministrazioni pubbliche a fine trimestre, in rapporto al PIL. Dati provvisori.',
      'definition_en' => 'Consolidated general government gross debt at quarter-end as a percentage of GDP. Provisional data.',
    ],
    'unemployment_rate' => [
      'period' => '2026-07',
      'source_id' => 'eurostat_unemployment',
      'dataset' => 'une_rt_m',
      'unit' => 'percent_of_labour_force',
      'definition_it' => 'Tasso totale di disoccupazione ILO, 15-74 anni, destagionalizzato.',
      'definition_en' => 'Total ILO unemployment rate, ages 15–74, seasonally adjusted.',
      'release_note' => 'Uses the verified release of 2026-09-01; no unretrieved August values substituted.',
    ],
    'taxation_type' => [
      'checked_on' => '2026-09-30',
      'definition_it' => 'Classificazione sintetica delle aliquote ordinarie sul reddito da lavoro dipendente dei residenti. Non descrive l’intero sistema fiscale, i contributi, il carico effettivo o i regimi speciali. Anche un’aliquota unica può prevedere deduzioni ed esenzioni.',
      'definition_en' => 'Summary of standard statutory rates on residents’ employment income. Does not describe the entire tax system, social contributions, effective burdens or special regimes. Flat rates may coexist with allowances and exemptions.',
      'sources' => 'Per-country metric_meta.taxation_type.source_url',
      'method' => 'Editorial classification based on the cited statutory rate schedules; progressive_taxation where marginal statutory rates rise with income, flat_taxation for one ordinary positive rate.',
    ],
  ],
  'sources' => [
    'eurostat_salary' => [
      'publisher' => 'Eurostat',
      'url' => 'https://ec.europa.eu/eurostat/databrowser/view/nama_10_fte/default/table?lang=en',
      'release_url' => 'https://ec.europa.eu/eurostat/web/products-eurostat-news/w/ddn-20251112-1',
      'published_at' => '2025-11-12',
    ],
    'dbnomics_salary' => [
      'publisher' => 'DBnomics, republication of Eurostat',
      'url' => 'https://db.nomics.world/Eurostat/nama_10_fte',
      'note' => 'Exact 2024 values cross-checked for the available series. Eurostat API could not be downloaded in this workspace.',
    ],
    'salary_republication' => [
      'publisher' => 'Visual Capitalist / Voronoi, republication of Eurostat',
      'url' => 'https://www.voronoiapp.com/economy/Mapped-Average-Full-Time-Salary-in-Europe-by-Country-7617',
      'note' => 'Complete 2024 table used for Eurostat-covered EU countries. OECD-based Netherlands figure deliberately not imported.',
    ],
    'eurostat_inflation' => [
      'publisher' => 'Eurostat',
      'url' => 'https://ec.europa.eu/eurostat/web/products-euro-indicators/w/2-17092026-ap',
      'published_at' => '2026-09-17',
    ],
    'eurostat_debt' => [
      'publisher' => 'Eurostat',
      'url' => 'https://ec.europa.eu/eurostat/web/products-euro-indicators/w/2-21072026-ap',
      'published_at' => '2026-07-21',
    ],
    'eurostat_unemployment' => [
      'publisher' => 'Eurostat',
      'url' => 'https://ec.europa.eu/eurostat/web/products-euro-indicators/w/3-01092026-bp',
      'published_at' => '2026-09-01',
    ],
  ],
  'value_labels' => [
    'progressive_taxation' => [
      'it' => 'Progressiva',
      'en' => 'Progressive',
    ],
    'flat_taxation' => [
      'it' => 'Aliquota unica',
      'en' => 'Flat rate',
    ],
  ],
];
