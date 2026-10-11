<?php
/**
 * Personal founder page draft for TAXpedia.
 * Built from the current About Us content for Ludovico Prunster.
 */

require_once __DIR__ . '/../../i18n/i18n.php';

if (!isset($FP_SUPPORTED)) $FP_SUPPORTED = array('it', 'en');

$FP_LANG = tp_lang();
if (!in_array($FP_LANG, $FP_SUPPORTED, true)) $FP_LANG = 'it';

$FP_I18N = array(
  'it' => array(
    'meta_title' => "Ludovico Prunster \u{2014} Responsabile amministrazione | TAXpedia",
    'meta_desc'  => "Pagina personale di Ludovico Prunster, Responsabile Amministrazione di TAXpedia.",

    'back'        => "Torna all'About us",
    'role'        => "Responsabile Amministrazione",
    'lead'        => "Gestisce e coordina la parte amministrativa di TAXpedia.",

    'profile_h2'  => "Profilo",
    'bio'         => "Nato a Torino, ha frequentato il Liceo Leonardo da Vinci a Milano. Da settembre 2024 studia scienze statistiche ed economiche all'Università Bicocca di Milano. Gestisce e coordina la parte amministrativa di TAXpedia.",

    'details_h2'  => "Informazioni",
    'born_l'      => "Citt\u{00E0} di nascita",
    'born_v'      => "Torino, Italia",
    'university_l'=> "Percorso universitario",
    'university_v'=> "Scienze Statistiche ed Economiche all'Università Bicocca di Milano, da settembre 2024",
    'role_l'      => "Ruolo in TAXpedia",
    'role_v'      => "Responsabile Amministrazione",

    'links_h2'    => "Link personali",
    'linkedin'    => "LinkedIn",
    'instagram'   => "Instagram",
  ),

  'en' => array(
    'meta_title' => "Ludovico Prunster \u{2014} Administrative Manager | TAXpedia",
    'meta_desc'  => "Personal page of Ludovico Prunster, Administrative Manager at TAXpedia.",

    'back'        => "Back to About us",
    'role'        => "Administrative Manager",
    'lead'        => "Manages and coordinates the administrative side of TAXpedia.",

    'profile_h2'  => "Profile",
    'bio'         => "Born in Turin, he attended Liceo Leonardo da Vinci in Milan. Since September 2024, he has been studying Statistical and Economic Sciences at the University of Milano-Bicocca. He manages and coordinates the administrative side of TAXpedia.",

    'details_h2'  => "Information",
    'born_l'      => "Place of birth",
    'born_v'      => "Turin, Italy",
    'university_l'=> "University background",
    'university_v'=> "Statistical and Economic Sciences at the University of Milano-Bicocca, since September 2024",
    'role_l'      => "Role at TAXpedia",
    'role_v'      => "Administrative Manager",

    'links_h2'    => "Personal links",
    'linkedin'    => "LinkedIn",
    'instagram'   => "Instagram",
  ),
);

if (!function_exists('fp_t')) {
  function fp_t($key) {
    global $FP_LANG, $FP_I18N;

    $lang = isset($FP_LANG) ? $FP_LANG : 'it';
    $dict = isset($FP_I18N) ? $FP_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('fp_e')) {
  function fp_e($key) {
    return htmlspecialchars(fp_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($FP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo fp_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <meta name="description" content="<?php echo fp_e('meta_desc'); ?>">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="../AboutUs.css" />

  <style>
    .founder-profile {
      max-width: 1040px;
      margin: 2.25rem auto 3rem;
    }

    .profile-back {
      display: inline-flex;
      align-items: center;
      gap: .35rem;
      margin-bottom: 1rem;
      color: var(--brand);
      font-weight: 700;
      text-decoration: none;
    }

    .profile-back:hover,
    .profile-back:focus {
      text-decoration: underline;
    }

    .profile-hero {
      display: grid;
      grid-template-columns: minmax(220px, 310px) 1fr;
      gap: clamp(1.5rem, 4vw, 3rem);
      align-items: center;
      padding: clamp(1.25rem, 4vw, 2.5rem);
      border: 1px solid rgba(15, 23, 42, .08);
      border-radius: 28px;
      background: #fff;
      box-shadow: 0 18px 45px rgba(15, 23, 42, .08);
    }

    .profile-photo-wrap {
      display: flex;
      justify-content: center;
    }

    .profile-photo {
      width: min(100%, 280px);
      aspect-ratio: 1 / 1;
      object-fit: cover;
      border-radius: 24px;
      box-shadow: 0 16px 35px rgba(15, 23, 42, .14);
    }

    .profile-eyebrow {
      margin: 0 0 .55rem;
      color: var(--muted);
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      font-size: .78rem;
    }

    .profile-title {
      margin: 0;
      color: var(--brand);
      font-family: Merriweather, serif;
      font-size: clamp(2rem, 5vw, 3.4rem);
      line-height: 1.05;
    }

    .profile-role {
      display: inline-flex;
      margin: 1rem 0 .75rem;
      padding: .45rem .85rem;
      border-radius: 999px;
      background: rgba(35, 91, 160, .10);
      color: var(--brand);
      font-weight: 700;
    }

    .profile-lead {
      max-width: 640px;
      margin: 0;
      color: var(--muted);
      font-size: 1.08rem;
      line-height: 1.65;
    }

    .profile-socials {
      display: flex;
      flex-wrap: wrap;
      gap: .75rem;
      margin-top: 1.35rem;
    }

    .profile-socials a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 42px;
      padding: .65rem 1rem;
      border-radius: 999px;
      border: 1px solid rgba(35, 91, 160, .24);
      color: var(--brand);
      font-weight: 700;
      text-decoration: none;
    }

    .profile-socials a:hover,
    .profile-socials a:focus {
      text-decoration: underline;
    }

    .profile-content {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(280px, .9fr);
      gap: 1.25rem;
      margin-top: 1.25rem;
    }

    .profile-section {
      padding: 1.35rem;
      border: 1px solid rgba(15, 23, 42, .08);
      border-radius: 22px;
      background: #fff;
    }

    .profile-section h2 {
      margin: 0 0 .75rem;
      color: var(--brand);
      font-family: Merriweather, serif;
    }

    .profile-section p {
      margin: 0;
      color: var(--muted);
      line-height: 1.75;
    }

    .profile-details {
      display: grid;
      gap: .9rem;
      margin: 0;
    }

    .profile-details div {
      padding-bottom: .9rem;
      border-bottom: 1px solid rgba(15, 23, 42, .08);
    }

    .profile-details div:last-child {
      padding-bottom: 0;
      border-bottom: 0;
    }

    .profile-details dt {
      margin: 0 0 .25rem;
      color: var(--brand);
      font-weight: 700;
    }

    .profile-details dd {
      margin: 0;
      color: var(--muted);
      line-height: 1.55;
    }

    @media (max-width: 780px) {
      .profile-hero,
      .profile-content {
        grid-template-columns: 1fr;
      }

      .profile-copy,
      .profile-title,
      .profile-lead {
        text-align: center;
      }

      .profile-role,
      .profile-socials,
      .profile-back {
        justify-content: center;
      }

      .profile-socials {
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main" role="main">
    <article class="founder-profile" aria-labelledby="founder-title">
      <a class="profile-back" href="/aboutus/aboutus.php?lang=<?php echo urlencode($FP_LANG); ?>">
        <span aria-hidden="true">&larr;</span>
        <?php echo fp_e('back'); ?>
      </a>

      <section class="profile-hero" aria-label="Ludovico Prunster">
        <div class="profile-photo-wrap">
          <img src="../imm/people/Ludovico.jpg" alt="Ludovico Prunster" class="profile-photo">
        </div>

        <div class="profile-copy">
          <h1 class="profile-title" id="founder-title">Ludovico Prunster</h1>
          <p class="profile-role"><?php echo fp_e('role'); ?></p>
          <p class="profile-lead"><?php echo fp_e('lead'); ?></p>

          <div class="profile-socials" aria-label="<?php echo fp_e('links_h2'); ?>">
            <a href="" target="_blank" rel="noopener"><?php echo fp_e('linkedin'); ?></a>
            <a href="" target="_blank" rel="noopener"><?php echo fp_e('instagram'); ?></a>
          </div>
        </div>
      </section>

      <div class="profile-content">
        <section class="profile-section" aria-labelledby="profile-heading">
          <h2 id="profile-heading"><?php echo fp_e('profile_h2'); ?></h2>
          <p><?php echo fp_e('bio'); ?></p>
        </section>

        <section class="profile-section" aria-labelledby="details-heading">
          <h2 id="details-heading"><?php echo fp_e('details_h2'); ?></h2>
          <dl class="profile-details">
            <div>
              <dt><?php echo fp_e('born_l'); ?></dt>
              <dd><?php echo fp_e('born_v'); ?></dd>
            </div>
            <div>
              <dt><?php echo fp_e('university_l'); ?></dt>
              <dd><?php echo fp_e('university_v'); ?></dd>
            </div>
            <div>
              <dt><?php echo fp_e('role_l'); ?></dt>
              <dd><?php echo fp_e('role_v'); ?></dd>
            </div>
          </dl>
        </section>
      </div>
    </article>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- Default Statcounter code for Home https://www.taxpedia.eu/ -->
  <script type="text/javascript">
  var sc_project=13170178;
  var sc_invisible=1;
  var sc_security="f093464a";
  </script>
  <script type="text/javascript"
  src="https://www.statcounter.com/counter/counter.js"
  async></script>
  <noscript><div class="statcounter"><a title="hit counter"
  href="https://statcounter.com/" target="_blank"><img
  class="statcounter"
  src="https://c.statcounter.com/13170178/0/f093464a/1/"
  alt="hit counter"
  referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
  <!-- End of Statcounter Code -->
</body>
</html>
