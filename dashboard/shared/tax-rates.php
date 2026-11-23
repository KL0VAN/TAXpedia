<?php
declare(strict_types=1);
if (!isset($country) || !is_array($country) || !function_exists('dash_t')) {
  http_response_code(404);
  return;
}
require_once __DIR__ . '/tax-data.php';
$taxModel = dash_tax_model($country);
?>
      <div class="dash-tax-rates">
        <?php if ($taxModel === null): ?>
          <p class="dash-tax-note"><?php echo dash_h(dash_t('Aliquote e scaglioni non disponibili in un formato leggibile dal calcolatore. Consulta il calcolatore nazionale per i dettagli.', 'Rates and bands are not available in a readable calculator format. Consult the national calculator for details.')); ?></p>
        <?php else: ?>
          <div class="dash-tax-table-wrap" role="region" aria-labelledby="tax-rates-caption" tabindex="0">
            <table class="dash-tax-table">
              <caption id="tax-rates-caption"><?php echo dash_h(dash_t('Aliquote e scaglioni del calcolatore TAXpedia', 'Rates and bands used by the TAXpedia calculator')); ?></caption>
              <thead>
                <tr>
                  <th scope="col"><?php echo dash_h(dash_t('Fascia di reddito (EUR)', 'Income band (EUR)')); ?></th>
                  <th scope="col"><?php echo dash_h($taxModel['single_rate'] ? dash_t('Aliquota unica', 'Single rate') : dash_t('Aliquota marginale', 'Marginal rate')); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($taxModel['bands'] as $band): ?>
                  <tr>
                    <th scope="row"><?php echo dash_h(dash_tax_income($band['lower'], $band['upper'])); ?></th>
                    <td><?php echo dash_h(dash_tax_rate($band)); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <p class="dash-tax-note"><?php echo dash_h(dash_t('Importi in euro, come nel calcolatore. Le aliquote marginali riguardano solo la quota di reddito della fascia, non la percentuale effettiva sul reddito totale. Deduzioni, contributi e componenti locali possono non essere distinti: sono parametri del modello, non una verifica delle aliquote di legge.', 'Amounts are in euros, as in the calculator. Marginal rates concern only the income within each band, not the effective percentage on total income. Allowances, contributions and local components may not be separated: these are model parameters, not a verification of statutory rates.')); ?></p>
          <?php if (($country['metrics']['taxation_type'] ?? '') === 'flat_taxation' && !$taxModel['single_rate']): ?>
            <p class="dash-tax-note"><?php echo dash_h(dash_t('La classificazione sopra descrive un sistema ad aliquota unica, ma il calcolatore usa coefficienti diversi per fascia. Qui sono riportati quei coefficienti, senza interpretarli come nuove aliquote legali.', 'The classification above describes a flat-rate system, but the calculator uses different coefficients by band. Those coefficients are reproduced here without interpreting them as new statutory rates.')); ?></p>
          <?php elseif ($taxModel['single_rate'] && $taxModel['zero_band']): ?>
            <p class="dash-tax-note"><?php echo dash_h(dash_t('Il modello combina una fascia allo 0% con un’unica aliquota positiva sul reddito eccedente la soglia.', 'The model combines a 0% band with a single positive rate on income above the threshold.')); ?></p>
          <?php elseif ($taxModel['single_rate']): ?>
            <p class="dash-tax-note"><?php echo dash_h(dash_t('Il file applica un coefficiente unico e non ne separa ulteriormente le componenti. Il valore non va confuso con il carico fiscale complessivo personale.', 'The file applies a single coefficient without separating its components further. The value must not be confused with an individual’s overall tax burden.')); ?></p>
          <?php endif; ?>
          <?php if ($taxModel['formula']): ?>
            <p class="dash-tax-note"><?php echo dash_h(dash_t('Nelle fasce a formula, le percentuali variabili sono ricavate dai coefficienti presenti nel codice, prima degli arrotondamenti, e sono approssimate. Non sono aliquote fisse applicate a tutta la fascia.', 'For formula-based bands, the variable percentages are derived from the coefficients in the code before rounding and are approximate. They are not fixed rates applied throughout the band.')); ?></p>
          <?php endif; ?>
          <?php if ($taxModel['regional_only']): ?>
            <p class="dash-tax-note"><?php echo dash_h(dash_t('Gli intervalli percentuali indicano il minimo e il massimo tra le aree presenti nel calcolatore. L’aliquota dipende dall’area, non aumenta continuamente all’interno della stessa fascia.', 'The percentage ranges show the minimum and maximum across the areas in the calculator. The rate depends on the area; it does not increase continuously within a band.')); ?></p>
          <?php endif; ?>
          <?php if ($taxModel['regional'] !== null): ?>
            <details class="dash-tax-regions">
              <summary><?php echo dash_h($taxModel['regional_only'] ? dash_t('Aliquote per area', 'Rates by area') : dash_t('Addizionali regionali presenti nel calcolatore', 'Regional surtaxes included in the calculator')); ?></summary>
              <?php if (!$taxModel['regional_only']): ?>
                <p class="dash-tax-note"><?php echo dash_h(dash_t('Queste aliquote regionali sono distinte dall’IRPEF nazionale mostrata sopra. Sono riportate soltanto le componenti territoriali presenti nel codice.', 'These regional rates are separate from the national income tax shown above. Only territorial components available in the code are listed.')); ?></p>
              <?php endif; ?>
              <div class="dash-tax-table-wrap" role="region" aria-labelledby="tax-regions-caption" tabindex="0">
                <table class="dash-tax-table dash-tax-region-table">
                  <caption id="tax-regions-caption"><?php echo dash_h(dash_t('Dettaglio territoriale del modello', 'Territorial detail in the model')); ?></caption>
                  <thead>
                    <tr>
                      <th scope="col"><?php echo dash_h(dash_t('Area', 'Area')); ?></th>
                      <?php $lower = 0.0; foreach ($taxModel['regional']['bounds'] as $upper): ?>
                        <th scope="col"><?php echo dash_h(dash_tax_income($lower, $upper)); ?></th>
                      <?php $lower = $upper; endforeach; ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($taxModel['regional']['regions'] as $region => $rates): ?>
                      <?php if ($DASH_LANG === 'en' && $taxModel['regional_only'] && preg_match('/\(([^()]+)\)$/u', $region, $regionName)) $region = $regionName[1]; ?>
                      <tr>
                        <th scope="row"><?php echo dash_h($region); ?></th>
                        <?php foreach ($rates as $rate): ?>
                          <td><?php echo dash_h(dash_tax_rate(['rate_min'=>$rate, 'rate_max'=>$rate, 'approximate'=>false])); ?></td>
                        <?php endforeach; ?>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </details>
          <?php elseif ($taxModel['regional_missing']): ?>
            <p class="dash-tax-note"><?php echo dash_h(dash_t('Il dettaglio delle addizionali regionali non è disponibile in un formato leggibile.', 'Regional surtax details are not available in a readable format.')); ?></p>
          <?php endif; ?>
        <?php endif; ?>
      </div>
