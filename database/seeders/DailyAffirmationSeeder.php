<?php

namespace Database\Seeders;

use App\Models\DailyAffirmative;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DailyAffirmationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $affirmations = [
            [
                'title' => 'I begin this new year under Mary\'s maternal protection and care.',
                'description' => 'Secure attachment to divine love reduces anxiety—pray for us sinners, now and at the hour of our death.',
                'show_date' => Carbon::parse('2025-01-01'),
            ],
            [
                'title' => 'Today I choose to believe in my capacity for transformation.',
                'description' => 'Growth mindset promotes neuroplasticity—with God, all things are possible.',
                'show_date' => Carbon::parse('2025-01-02'),
            ],
            [
                'title' => 'I am developing new patterns that honor my highest values.',
                'description' => 'Consistent habits strengthen neural pathways—whatever is true and noble, think on these things.',
                'show_date' => Carbon::parse('2025-01-03'),
            ],
            [
                'title' => 'My mind is being renewed through truth and spiritual connection.',
                'description' => 'Cognitive restructuring changes brain patterns—be transformed by the renewing of your mind.',
                'show_date' => Carbon::parse('2025-01-04'),
            ],
            [
                'title' => 'I choose to practice self-compassion as I begin this journey.',
                'description' => 'Self-kindness reduces stress hormones—be kind to yourself as Christ is kind to you.',
                'show_date' => Carbon::parse('2025-01-05'),
            ],
            [
                'title' => 'Today the light of Christ illuminates my path to freedom.',
                'description' => 'Light exposure regulates mood and circadian rhythms—the people walking in darkness have seen a great light.',
                'show_date' => Carbon::parse('2025-01-06'),
            ],
            [
                'title' => 'I am learning to find strength in vulnerability and honesty.',
                'description' => 'Authentic expression reduces cortisol—confess your faults to one another and be healed.',
                'show_date' => Carbon::parse('2025-01-07'),
            ],
            [
                'title' => 'Today I reach for the joy that satisfies.',
                'description' => 'False pleasure fades fast, but joy fills me deeply—taste and see that the Lord is good.',
                'show_date' => Carbon::parse('2025-01-08'),
            ],
            [
                'title' => 'I choose to be present in this moment rather than escaping.',
                'description' => 'Mindfulness strengthens prefrontal control—be still and know that I am God.',
                'show_date' => Carbon::parse('2025-01-09'),
            ],
            [
                'title' => 'Today I celebrate small victories as building blocks to freedom.',
                'description' => 'Positive reinforcement strengthens desired behaviors—rejoice in the Lord always.',
                'show_date' => Carbon::parse('2025-01-10'),
            ],
            [
                'title' => 'I am becoming more aware of my triggers and responses.',
                'description' => 'Self-awareness improves emotional regulation—be alert and sober-minded.',
                'show_date' => Carbon::parse('2025-01-11'),
            ],
            [
                'title' => 'My relationships are being restored through grace and authenticity.',
                'description' => 'Vulnerability creates deeper connections—love covers a multitude of sins.',
                'show_date' => Carbon::parse('2025-01-12'),
            ],
            [
                'title' => 'I choose to fill my mind with things that bring life and light.',
                'description' => 'Positive input creates positive neural pathways—whatever is lovely, think on these things.',
                'show_date' => Carbon::parse('2025-01-13'),
            ],
            [
                'title' => 'Today I practice patience with my healing process.',
                'description' => 'Patience reduces stress and promotes healing—let patience have its perfect work.',
                'show_date' => Carbon::parse('2025-01-14'),
            ],
            [
                'title' => 'I am discovering true joy in authentic connections.',
                'description' => 'Oxytocin from real relationships creates lasting happiness—taste and see that the Lord is good.',
                'show_date' => Carbon::parse('2025-01-15'),
            ],
            [
                'title' => 'My brain is capable of remarkable healing and change.',
                'description' => 'Neuroplasticity continues throughout life—He makes all things new.',
                'show_date' => Carbon::parse('2025-01-16'),
            ],
            [
                'title' => 'I choose courage over comfort in facing my challenges.',
                'description' => 'Courage strengthens with practice—be strong and courageous, the Lord is with you.',
                'show_date' => Carbon::parse('2025-01-17'),
            ],
            [
                'title' => 'Today I invest in activities that bring purpose and joy.',
                'description' => 'Behavioral activation combats depression—whatever is excellent, think on these things.',
                'show_date' => Carbon::parse('2025-01-18'),
            ],
            [
                'title' => 'I am developing wisdom to align my choices with my values.',
                'description' => 'Values-based decision-making strengthens willpower—seek first the kingdom of God.',
                'show_date' => Carbon::parse('2025-01-19'),
            ],
            [
                'title' => 'My worth is established by God\'s unchanging love for me.',
                'description' => 'Unconditional love reduces performance anxiety—you are the apple of His eye.',
                'show_date' => Carbon::parse('2025-01-20'),
            ],
            [
                'title' => 'I choose to see setbacks as opportunities for deeper learning.',
                'description' => 'Reframing failure promotes growth—count it all joy when you face trials.',
                'show_date' => Carbon::parse('2025-01-21'),
            ],
            [
                'title' => 'My heart is being trained to find joy in simple gifts.',
                'description' => 'Gratitude rewires the brain for sustained joy—every good gift comes from above.',
                'show_date' => Carbon::parse('2025-01-22'),
            ],
            [
                'title' => 'I am learning to surf the waves of difficult emotions.',
                'description' => 'Emotional tolerance builds resilience—this too shall pass.',
                'show_date' => Carbon::parse('2025-01-23'),
            ],
            [
                'title' => 'My story is being rewritten with each faithful choice like St. Francis, who taught gentleness with oneself.',
                'description' => 'Narrative change reshapes identity—old things have passed away, all things are new.',
                'show_date' => Carbon::parse('2025-01-24'),
            ],
            [
                'title' => 'I choose to believe in the possibility of complete freedom.',
                'description' => 'Hope activates positive expectancy circuits—hope does not disappoint.',
                'show_date' => Carbon::parse('2025-01-25'),
            ],
            [
                'title' => 'Today I practice discipline as an expression of self-love.',
                'description' => 'Self-control strengthens prefrontal function—discipline yourself for godliness.',
                'show_date' => Carbon::parse('2025-01-26'),
            ],
            [
                'title' => 'I am becoming more skilled at managing stress and anxiety.',
                'description' => 'Stress management prevents relapse—cast your cares upon Him, for He cares for you.',
                'show_date' => Carbon::parse('2025-01-27'),
            ],
            [
                'title' => 'My healing journey unfolds in perfect divine timing.',
                'description' => 'Individual recovery timelines vary—to everything there is a season.',
                'show_date' => Carbon::parse('2025-01-28'),
            ],
            [
                'title' => 'I choose to speak life and truth over my circumstances.',
                'description' => 'Self-talk shapes neural pathways—death and life are in the power of the tongue.',
                'show_date' => Carbon::parse('2025-01-29'),
            ],
            [
                'title' => 'Today I rest in the knowledge that I am deeply loved.',
                'description' => 'Secure attachment reduces addictive behaviors—nothing can separate you from God\'s love.',
                'show_date' => Carbon::parse('2025-01-30'),
            ],
            [
                'title' => 'I end this month with gratitude for growth and new perspective, following St. John Bosco\'s gentle way.',
                'description' => 'Reflection on progress reinforces positive change—His faithfulness endures forever.',
                'show_date' => Carbon::parse('2025-01-31'),
            ],
            [
                'title' => 'I begin this month with a heart open to love and healing.',
                'description' => 'Openness to love activates bonding circuits—perfect love casts out fear.',
                'show_date' => Carbon::parse('2025-02-01'),
            ],
            [
                'title' => 'Today like Mary and Joseph, I present my struggles to God for purification.',
                'description' => 'Surrender activates parasympathetic calm—thy will be done.',
                'show_date' => Carbon::parse('2025-02-02'),
            ],
            [
                'title' => 'I am developing healthy boundaries that honor my values.',
                'description' => 'Boundaries improve emotional regulation—above all else, guard your heart.',
                'show_date' => Carbon::parse('2025-02-03'),
            ],
            [
                'title' => 'My mind is being transformed through consistent spiritual practices.',
                'description' => 'Meditation changes brain structure—be still and know that I am God.',
                'show_date' => Carbon::parse('2025-02-04'),
            ],
            [
                'title' => 'I choose to practice radical honesty with myself and others.',
                'description' => 'Authentic vulnerability reduces cortisol—confess your faults to one another.',
                'show_date' => Carbon::parse('2025-02-05'),
            ],
            [
                'title' => 'Today I invest in community and meaningful relationships.',
                'description' => 'Social connection releases healing chemicals—bear one another\'s burdens.',
                'show_date' => Carbon::parse('2025-02-06'),
            ],
            [
                'title' => 'Today I choose the joy of genuine intimacy over empty pleasure.',
                'description' => 'True intimacy activates deeper reward circuits—love never fails.',
                'show_date' => Carbon::parse('2025-02-07'),
            ],
            [
                'title' => 'My identity is anchored in divine love, not human approval.',
                'description' => 'Secure identity reduces people-pleasing—you are chosen, beloved, and set apart.',
                'show_date' => Carbon::parse('2025-02-08'),
            ],
            [
                'title' => 'I choose to forgive myself and others as I\'ve been forgiven.',
                'description' => 'Forgiveness reduces stress hormones—forgive as you have been forgiven.',
                'show_date' => Carbon::parse('2025-02-09'),
            ],
            [
                'title' => 'Today I celebrate the capacity for love that lives within me.',
                'description' => 'Self-acceptance improves mental health—you are fearfully and wonderfully made.',
                'show_date' => Carbon::parse('2025-02-10'),
            ],
            [
                'title' => 'I am becoming more skilled at expressing my emotions healthily, trusting in Mary\'s healing presence.',
                'description' => 'Emotional expression improves mental health—be slow to anger, quick to listen.',
                'show_date' => Carbon::parse('2025-02-11'),
            ],
            [
                'title' => 'My relationships are deepening as I become more vulnerable.',
                'description' => 'Authentic connection releases oxytocin—love covers a multitude of sins.',
                'show_date' => Carbon::parse('2025-02-12'),
            ],
            [
                'title' => 'I choose to invest in love that builds up rather than tears down.',
                'description' => 'Positive relationships strengthen resilience—love builds up, but knowledge puffs up.',
                'show_date' => Carbon::parse('2025-02-13'),
            ],
            [
                'title' => 'I celebrate the joy of loving myself as God loves me, following St. Valentine\'s example of pure love.',
                'description' => 'Self-compassion releases feel-good hormones—you are fearfully and wonderfully made.',
                'show_date' => Carbon::parse('2025-02-14'),
            ],
            [
                'title' => 'I am learning to receive love and support from others.',
                'description' => 'Receiving support activates healing circuits—it is more blessed to give than receive, but receiving is also blessed.',
                'show_date' => Carbon::parse('2025-02-15'),
            ],
            [
                'title' => 'My character is being refined through learning to love well.',
                'description' => 'Character development enhances relationships—love is patient, love is kind.',
                'show_date' => Carbon::parse('2025-02-16'),
            ],
            [
                'title' => 'I choose to see my struggles as deepening my capacity for empathy.',
                'description' => 'Empathy develops through shared experience—comfort others with the comfort you\'ve received.',
                'show_date' => Carbon::parse('2025-02-17'),
            ],
            [
                'title' => 'Today I practice presence and attention in my relationships.',
                'description' => 'Mindful presence strengthens connection—be anxious for nothing, but in everything give thanks.',
                'show_date' => Carbon::parse('2025-02-18'),
            ],
            [
                'title' => 'I am developing emotional intelligence in my interactions.',
                'description' => 'Emotional intelligence improves relationships—the wise person learns from experience.',
                'show_date' => Carbon::parse('2025-02-19'),
            ],
            [
                'title' => 'My brain is rewiring toward healthy attachment and connection.',
                'description' => 'Secure attachment patterns can be learned—He makes all things new.',
                'show_date' => Carbon::parse('2025-02-20'),
            ],
            [
                'title' => 'My vulnerability opens the door to authentic joy.',
                'description' => 'Courage to be real creates lasting happiness—perfect love casts out fear.',
                'show_date' => Carbon::parse('2025-02-21'),
            ],
            [
                'title' => 'Today I practice gratitude for the love I\'ve experienced, grounded in apostolic faith.',
                'description' => 'Gratitude increases positive emotions—give thanks in all circumstances.',
                'show_date' => Carbon::parse('2025-02-22'),
            ],
            [
                'title' => 'I am learning to love without conditions or expectations.',
                'description' => 'Unconditional love transforms relationships—love keeps no record of wrongs.',
                'show_date' => Carbon::parse('2025-02-23'),
            ],
            [
                'title' => 'My worth comes from being loved by God, not from others\' approval.',
                'description' => 'Divine love provides security—you are the apple of His eye.',
                'show_date' => Carbon::parse('2025-02-24'),
            ],
            [
                'title' => 'I choose to speak words of life and encouragement to others.',
                'description' => 'Positive communication strengthens relationships—let your words be seasoned with grace.',
                'show_date' => Carbon::parse('2025-02-25'),
            ],
            [
                'title' => 'Today I practice patience and kindness in all my interactions.',
                'description' => 'Patience builds relational trust—let patience have its perfect work.',
                'show_date' => Carbon::parse('2025-02-26'),
            ],
            [
                'title' => 'I am becoming more aware of how I affect others.',
                'description' => 'Social awareness improves relationships—consider others more important than yourself.',
                'show_date' => Carbon::parse('2025-02-27'),
            ],
            [
                'title' => 'My story includes learning to love and be loved well.',
                'description' => 'Narrative identity includes relational growth—you are a new creation in Christ.',
                'show_date' => Carbon::parse('2025-02-28'),
            ],
            [
                'title' => 'I welcome this new season with hope for fresh growth.',
                'description' => 'Seasonal changes activate renewal circuits—His mercies are new every morning.',
                'show_date' => Carbon::parse('2025-03-01'),
            ],
            [
                'title' => 'Today I choose to plant seeds of healthy habits in my life.',
                'description' => 'Consistent actions create neural pathways—whatever a man sows, he will reap.',
                'show_date' => Carbon::parse('2025-03-02'),
            ],
            [
                'title' => 'I am developing spiritual disciplines that ground me in truth.',
                'description' => 'Spiritual practices change brain structure—be still and know that I am God.',
                'show_date' => Carbon::parse('2025-03-03'),
            ],
            [
                'title' => 'My mind is being transformed through consistent renewal.',
                'description' => 'Cognitive restructuring changes thought patterns—be transformed by the renewing of your mind.',
                'show_date' => Carbon::parse('2025-03-04'),
            ],
            [
                'title' => 'I choose to practice mindfulness in each moment of today.',
                'description' => 'Mindfulness strengthens prefrontal control—be anxious for nothing, but in everything give thanks.',
                'show_date' => Carbon::parse('2025-03-05'),
            ],
            [
                'title' => 'Today I invest in growth that honors my body, mind, and spirit.',
                'description' => 'Holistic health improves all areas—honor God with your body.',
                'show_date' => Carbon::parse('2025-03-06'),
            ],
            [
                'title' => 'I find joy in surrendering control to God\'s perfect plan.',
                'description' => 'Letting go reduces cortisol and increases peace—His yoke is easy, His burden light.',
                'show_date' => Carbon::parse('2025-03-07'),
            ],
            [
                'title' => 'My identity is rooted in who God says I am, not my performance.',
                'description' => 'Identity security reduces anxiety—you are chosen, beloved, and holy.',
                'show_date' => Carbon::parse('2025-03-08'),
            ],
            [
                'title' => 'I choose to embrace both my strengths and my areas for growth.',
                'description' => 'Self-acceptance promotes change—you are fearfully and wonderfully made.',
                'show_date' => Carbon::parse('2025-03-09'),
            ],
            [
                'title' => 'Today I celebrate the new life growing within me.',
                'description' => 'Positive reinforcement strengthens growth—rejoice in the Lord always.',
                'show_date' => Carbon::parse('2025-03-10'),
            ],
            [
                'title' => 'I am becoming more aware of the patterns that shape my life.',
                'description' => 'Pattern recognition improves self-regulation—the wise person learns from experience.',
                'show_date' => Carbon::parse('2025-03-11'),
            ],
            [
                'title' => 'My relationships are flourishing as I become more authentic.',
                'description' => 'Authenticity deepens connections—love one another deeply from the heart.',
                'show_date' => Carbon::parse('2025-03-12'),
            ],
            [
                'title' => 'I choose to fill my mind with truth, beauty, and goodness.',
                'description' => 'Positive input creates positive neural pathways—whatever is lovely, think on these things.',
                'show_date' => Carbon::parse('2025-03-13'),
            ],
            [
                'title' => 'Today I plant seeds of joy that will bloom in season.',
                'description' => 'Delayed gratification increases dopamine sensitivity—weeping may endure for a night, but joy comes in the morning.',
                'show_date' => Carbon::parse('2025-03-14'),
            ],
            [
                'title' => 'I am learning to find strength in spiritual practices and community.',
                'description' => 'Social and spiritual support enhance recovery—where two or three are gathered, I am there.',
                'show_date' => Carbon::parse('2025-03-15'),
            ],
            [
                'title' => 'My brain continues to develop new patterns of health and wholeness.',
                'description' => 'Neuroplasticity enables continuous growth—He makes all things new.',
                'show_date' => Carbon::parse('2025-03-16'),
            ],
            [
                'title' => 'I choose courage over comfort in pursuing my values, following St. Patrick\'s bold example.',
                'description' => 'Values-based living strengthens motivation—be strong and courageous, the Lord is with you.',
                'show_date' => Carbon::parse('2025-03-17'),
            ],
            [
                'title' => 'Today I invest in activities that bring life and energy.',
                'description' => 'Behavioral activation combats depression—whatever is excellent, think on these things.',
                'show_date' => Carbon::parse('2025-03-18'),
            ],
            [
                'title' => 'I am developing wisdom to discern what serves my highest good, like St. Joseph\'s pure heart.',
                'description' => 'Discernment improves decision-making—seek first the kingdom of God.',
                'show_date' => Carbon::parse('2025-03-19'),
            ],
            [
                'title' => 'My worth is established by God\'s unchanging love for me.',
                'description' => 'Unconditional love reduces performance anxiety—you are the apple of His eye.',
                'show_date' => Carbon::parse('2025-03-20'),
            ],
            [
                'title' => 'I choose the joy of growth over the comfort of stagnation.',
                'description' => 'Challenge activates resilience pathways—count it all joy when you face trials.',
                'show_date' => Carbon::parse('2025-03-21'),
            ],
            [
                'title' => 'Today I practice gratitude for the signs of new life around me.',
                'description' => 'Gratitude increases positive neurotransmitters—give thanks in all circumstances.',
                'show_date' => Carbon::parse('2025-03-22'),
            ],
            [
                'title' => 'I am learning to trust the process of gradual transformation.',
                'description' => 'Process orientation reduces pressure—He who began a good work will complete it.',
                'show_date' => Carbon::parse('2025-03-23'),
            ],
            [
                'title' => 'My story is one of continuous growth and renewal.',
                'description' => 'Narrative change reshapes identity—old things have passed away, all things are new.',
                'show_date' => Carbon::parse('2025-03-24'),
            ],
            [
                'title' => 'I choose to believe in my capacity for lasting change, saying \'yes\' like Mary.',
                'description' => 'Growth mindset promotes resilience—with God, all things are possible.',
                'show_date' => Carbon::parse('2025-03-25'),
            ],
            [
                'title' => 'Today I practice discipline as cultivation of my best self.',
                'description' => 'Self-control strengthens prefrontal function—discipline yourself for godliness.',
                'show_date' => Carbon::parse('2025-03-26'),
            ],
            [
                'title' => 'I am becoming more skilled at nurturing my spiritual life through Lenten practices.',
                'description' => 'Spiritual practices enhance well-being—draw near to God, and He will draw near to you.',
                'show_date' => Carbon::parse('2025-03-27'),
            ],
            [
                'title' => 'My healing journey continues to unfold in perfect timing.',
                'description' => 'Individual growth follows natural rhythms—to everything there is a season.',
                'show_date' => Carbon::parse('2025-03-28'),
            ],
            [
                'title' => 'I choose to speak words of life and growth over my future.',
                'description' => 'Self-talk shapes neural pathways—death and life are in the power of the tongue.',
                'show_date' => Carbon::parse('2025-03-29'),
            ],
            [
                'title' => 'Today I rest in the knowledge that I am growing in grace.',
                'description' => 'Secure attachment reduces addictive behaviors—nothing can separate you from God\'s love.',
                'show_date' => Carbon::parse('2025-03-30'),
            ],
            [
                'title' => 'I end this month with gratitude for the new growth I see.',
                'description' => 'Reflection on progress reinforces positive change—His faithfulness endures forever.',
                'show_date' => Carbon::parse('2025-03-31'),
            ],
            [
                'title' => 'I begin this month preparing for resurrection through purification.',
                'description' => 'Positive expectancy activates motivation circuits—His mercies are new every morning.',
                'show_date' => Carbon::parse('2025-04-01'),
            ],
            [
                'title' => 'Today I embrace the Lenten call to turn away from sin and toward life.',
                'description' => 'Spiritual renewal activates hope circuits—repent and believe in the Gospel.',
                'show_date' => Carbon::parse('2025-04-02'),
            ],
            [
                'title' => 'I am developing resilience through consistent spiritual practices.',
                'description' => 'Spiritual disciplines strengthen emotional regulation—be still and know that I am God.',
                'show_date' => Carbon::parse('2025-04-03'),
            ],
            [
                'title' => 'My mind is being transformed through meditation on Christ\'s passion.',
                'description' => 'Contemplative practices change brain structure—be transformed by the renewing of your mind.',
                'show_date' => Carbon::parse('2025-04-04'),
            ],
            [
                'title' => 'I choose to practice gratitude even in the desert of struggle.',
                'description' => 'Gratitude increases positive neurotransmitters—give thanks in all circumstances.',
                'show_date' => Carbon::parse('2025-04-05'),
            ],
            [
                'title' => 'Today I invest in the renewal of my body, mind, and spirit.',
                'description' => 'Holistic renewal improves all areas—honor God with your body.',
                'show_date' => Carbon::parse('2025-04-06'),
            ],
            [
                'title' => 'I am learning to find hope in the midst of sacrifice.',
                'description' => 'Hope activates positive expectancy circuits—hope does not disappoint.',
                'show_date' => Carbon::parse('2025-04-07'),
            ],
            [
                'title' => 'Today I embrace the joy of resurrection life within me.',
                'description' => 'Hope activates reward anticipation circuits—because He lives, I can face tomorrow.',
                'show_date' => Carbon::parse('2025-04-08'),
            ],
            [
                'title' => 'I choose to embrace the light that dispels darkness in my life.',
                'description' => 'Light exposure regulates mood and sleep—the light shines in the darkness.',
                'show_date' => Carbon::parse('2025-04-09'),
            ],
            [
                'title' => 'Today I celebrate the new life emerging within me through Lenten disciplines.',
                'description' => 'Positive reinforcement strengthens growth—rejoice in the Lord always.',
                'show_date' => Carbon::parse('2025-04-10'),
            ],
            [
                'title' => 'I am becoming more aware of the hope that lives within me.',
                'description' => 'Hope awareness improves mental health—Christ in you, the hope of glory.',
                'show_date' => Carbon::parse('2025-04-11'),
            ],
            [
                'title' => 'My relationships are blooming as I become more loving through sacrifice.',
                'description' => 'Love strengthens neural connections—love one another deeply from the heart.',
                'show_date' => Carbon::parse('2025-04-12'),
            ],
            [
                'title' => 'I choose to fill my mind with thoughts of hope and resurrection.',
                'description' => 'Positive thinking creates positive neural pathways—whatever is lovely, think on these things.',
                'show_date' => Carbon::parse('2025-04-13'),
            ],
            [
                'title' => 'Today I practice patience with my transformation process as I enter Holy Week.',
                'description' => 'Patience reduces stress and promotes healing—let patience have its perfect work.',
                'show_date' => Carbon::parse('2025-04-14'),
            ],
            [
                'title' => 'I find joy in simple beauty surrounding me each day.',
                'description' => 'Aesthetic appreciation increases serotonin—this is the day the Lord has made.',
                'show_date' => Carbon::parse('2025-04-15'),
            ],
            [
                'title' => 'My brain continues to develop patterns of hope and healing.',
                'description' => 'Neuroplasticity enables continuous renewal—He makes all things new.',
                'show_date' => Carbon::parse('2025-04-16'),
            ],
            [
                'title' => 'I choose courage over fear in stepping into my destiny.',
                'description' => 'Courage strengthens with practice—be strong and courageous, the Lord is with you.',
                'show_date' => Carbon::parse('2025-04-17'),
            ],
            [
                'title' => 'Today I invest in activities that bring life and growth, remembering Christ\'s gift.',
                'description' => 'Behavioral activation combats depression—whatever is excellent, think on these things.',
                'show_date' => Carbon::parse('2025-04-18'),
            ],
            [
                'title' => 'I am developing wisdom to recognize opportunities for growth through the cross.',
                'description' => 'Discernment improves decision-making—seek first the kingdom of God.',
                'show_date' => Carbon::parse('2025-04-19'),
            ],
            [
                'title' => 'My worth is established by God\'s love, not by my achievements.',
                'description' => 'Unconditional love reduces performance anxiety—you are the apple of His eye.',
                'show_date' => Carbon::parse('2025-04-20'),
            ],
            [
                'title' => 'I choose to see every experience as resurrection and new life.',
                'description' => 'Growth mindset promotes resilience—He is risen, He is risen indeed!',
                'show_date' => Carbon::parse('2025-04-21'),
            ],
            [
                'title' => 'My heart overflows with the joy of new beginnings.',
                'description' => 'Fresh starts activate motivation centers—His mercies are new every morning.',
                'show_date' => Carbon::parse('2025-04-22'),
            ],
            [
                'title' => 'I am learning to trust in the timing of my transformation like the Easter dawn.',
                'description' => 'Process orientation reduces pressure—He who began a good work will complete it.',
                'show_date' => Carbon::parse('2025-04-23'),
            ],
            [
                'title' => 'My story is one of resurrection and new possibilities.',
                'description' => 'Narrative change reshapes identity—old things have passed away, all things are new.',
                'show_date' => Carbon::parse('2025-04-24'),
            ],
            [
                'title' => 'I choose to believe in the power of God to transform my life through the Gospel.',
                'description' => 'Faith activates hope circuits—with God, all things are possible.',
                'show_date' => Carbon::parse('2025-04-25'),
            ],
            [
                'title' => 'Today I practice discipline as tending the garden of my soul.',
                'description' => 'Self-control strengthens prefrontal function—discipline yourself for godliness.',
                'show_date' => Carbon::parse('2025-04-26'),
            ],
            [
                'title' => 'I am becoming more skilled at cultivating inner peace.',
                'description' => 'Peace practices enhance well-being—the peace of God guards your heart and mind.',
                'show_date' => Carbon::parse('2025-04-27'),
            ],
            [
                'title' => 'My healing journey continues to unfold like a beautiful garden.',
                'description' => 'Individual growth follows natural patterns—to everything there is a season.',
                'show_date' => Carbon::parse('2025-04-28'),
            ],
            [
                'title' => 'I choose to speak words of hope and possibility over my life.',
                'description' => 'Self-talk shapes neural pathways—death and life are in the power of the tongue.',
                'show_date' => Carbon::parse('2025-04-29'),
            ],
            [
                'title' => 'Today I rest in the knowledge that I am being renewed daily.',
                'description' => 'Secure attachment reduces addictive behaviors—nothing can separate you from God\'s love.',
                'show_date' => Carbon::parse('2025-04-30'),
            ],
            [
                'title' => 'I begin this month celebrating the full bloom of my growth through honest work.',
                'description' => 'Celebration activates reward circuits—His mercies are new every morning.',
                'show_date' => Carbon::parse('2025-05-01'),
            ],
            [
                'title' => 'Today I choose to embrace the abundance of life available to me.',
                'description' => 'Abundance mindset promotes well-being—I have come that you might have life abundantly.',
                'show_date' => Carbon::parse('2025-05-02'),
            ],
            [
                'title' => 'I am developing deep roots of faith that sustain me.',
                'description' => 'Spiritual grounding enhances resilience—be rooted and grounded in love.',
                'show_date' => Carbon::parse('2025-05-03'),
            ],
            [
                'title' => 'My mind is being transformed through contemplating God\'s goodness.',
                'description' => 'Positive contemplation changes brain structure—be transformed by the renewing of your mind.',
                'show_date' => Carbon::parse('2025-05-04'),
            ],
            [
                'title' => 'I choose to practice mindfulness of the beauty in each moment.',
                'description' => 'Mindfulness increases life satisfaction—be anxious for nothing, but in everything give thanks.',
                'show_date' => Carbon::parse('2025-05-05'),
            ],
            [
                'title' => 'Today I flourish in the joy of living fully alive.',
                'description' => 'Engagement activities increase flow states—I have come that you might have life abundantly.',
                'show_date' => Carbon::parse('2025-05-06'),
            ],
            [
                'title' => 'I am learning to find strength in gentleness and humility.',
                'description' => 'Gentle strength activates parasympathetic calm—blessed are the meek.',
                'show_date' => Carbon::parse('2025-05-07'),
            ],
            [
                'title' => 'My identity is rooted in being God\'s beloved child.',
                'description' => 'Identity security reduces anxiety—you are chosen, beloved, and holy.',
                'show_date' => Carbon::parse('2025-05-08'),
            ],
            [
                'title' => 'I choose to embrace the fullness of life that God offers.',
                'description' => 'Fullness of life activates positive emotions—taste and see that the Lord is good.',
                'show_date' => Carbon::parse('2025-05-09'),
            ],
            [
                'title' => 'Today I celebrate the beautiful person I am becoming.',
                'description' => 'Self-acceptance improves mental health—you are fearfully and wonderfully made.',
                'show_date' => Carbon::parse('2025-05-10'),
            ],
            [
                'title' => 'I am becoming more aware of the gifts and talents within me.',
                'description' => 'Strengths awareness improves self-efficacy—each person has received a gift.',
                'show_date' => Carbon::parse('2025-05-11'),
            ],
            [
                'title' => 'My relationships are flourishing as I give and receive love freely.',
                'description' => 'Healthy relationships strengthen well-being—love one another deeply from the heart.',
                'show_date' => Carbon::parse('2025-05-12'),
            ],
            [
                'title' => 'I choose the joy of wonder over the numbness of escape, trusting in Mary\'s care.',
                'description' => 'Awe and gratitude create positive neural cascades—whatever is lovely, think on these things.',
                'show_date' => Carbon::parse('2025-05-13'),
            ],
            [
                'title' => 'Today I practice patience with my continued growth.',
                'description' => 'Patience reduces stress and promotes healing—let patience have its perfect work.',
                'show_date' => Carbon::parse('2025-05-14'),
            ],
            [
                'title' => 'I am learning to find joy in serving others and making a difference.',
                'description' => 'Service activates meaning circuits—serve one another in love.',
                'show_date' => Carbon::parse('2025-05-15'),
            ],
            [
                'title' => 'My brain continues to develop patterns of flourishing and abundance.',
                'description' => 'Neuroplasticity enables continuous growth—He makes all things new.',
                'show_date' => Carbon::parse('2025-05-16'),
            ],
            [
                'title' => 'I choose courage in fully embracing my authentic self.',
                'description' => 'Authenticity strengthens self-esteem—be strong and courageous, the Lord is with you.',
                'show_date' => Carbon::parse('2025-05-17'),
            ],
            [
                'title' => 'Today I invest in activities that bring meaning and fulfillment.',
                'description' => 'Meaningful activity activates reward circuits—whatever is excellent, think on these things.',
                'show_date' => Carbon::parse('2025-05-18'),
            ],
            [
                'title' => 'I am developing wisdom to live fully in each season of life.',
                'description' => 'Wisdom enhances life satisfaction—seek first the kingdom of God.',
                'show_date' => Carbon::parse('2025-05-19'),
            ],
            [
                'title' => 'My identity is rooted in the joy of being God\'s beloved.',
                'description' => 'Secure attachment provides lasting contentment—you are the apple of His eye.',
                'show_date' => Carbon::parse('2025-05-20'),
            ],
            [
                'title' => 'I choose to see my life as a beautiful tapestry being woven.',
                'description' => 'Meaning-making promotes resilience—all things work together for good.',
                'show_date' => Carbon::parse('2025-05-21'),
            ],
            [
                'title' => 'Today I practice gratitude for the abundance in my life.',
                'description' => 'Gratitude activates positive brain circuits—give thanks in all circumstances.',
                'show_date' => Carbon::parse('2025-05-22'),
            ],
            [
                'title' => 'I am learning to trust in the goodness of God\'s plan for me.',
                'description' => 'Trust reduces anxiety and promotes peace—He who began a good work will complete it.',
                'show_date' => Carbon::parse('2025-05-23'),
            ],
            [
                'title' => 'My story is one of transformation and flourishing.',
                'description' => 'Narrative change reshapes identity—old things have passed away, all things are new.',
                'show_date' => Carbon::parse('2025-05-24'),
            ],
            [
                'title' => 'I choose to believe in my capacity to live fully and love deeply.',
                'description' => 'Growth mindset promotes flourishing—with God, all things are possible.',
                'show_date' => Carbon::parse('2025-05-25'),
            ],
            [
                'title' => 'Today I practice discipline as cultivation of my gifts and calling with joyful heart.',
                'description' => 'Self-control strengthens prefrontal function—discipline yourself for godliness.',
                'show_date' => Carbon::parse('2025-05-26'),
            ],
            [
                'title' => 'I am becoming more skilled at living with intention and purpose.',
                'description' => 'Intentional living enhances well-being—whatever you do, do it heartily as to the Lord.',
                'show_date' => Carbon::parse('2025-05-27'),
            ],
            [
                'title' => 'My healing journey has led me to a place of beauty and strength.',
                'description' => 'Recovery leads to post-traumatic growth—to everything there is a season.',
                'show_date' => Carbon::parse('2025-05-28'),
            ],
            [
                'title' => 'I choose to speak words of blessing and possibility over my future.',
                'description' => 'Self-talk shapes neural pathways—death and life are in the power of the tongue.',
                'show_date' => Carbon::parse('2025-05-29'),
            ],
            [
                'title' => 'Today I rest in the knowledge that I am beloved and whole.',
                'description' => 'Secure attachment reduces addictive behaviors—nothing can separate you from God\'s love.',
                'show_date' => Carbon::parse('2025-05-30'),
            ],
            [
                'title' => 'I end this month with gratitude for the fullness of life I\'ve found, like Mary\'s visit to Elizabeth.',
                'description' => 'Reflection on progress reinforces positive change—His faithfulness endures forever.',
                'show_date' => Carbon::parse('2025-05-31'),
            ],
            [
                'title' => 'Today, I conquer my urges, proving my mind bends to God\'s will.',
                'description' => 'Cravings weaken with resistance—dare to master them with divine strength.',
                'show_date' => Carbon::parse('2025-06-01'),
            ],
            [
                'title' => 'I reject escape today, facing life with a soul forged in grace.',
                'description' => 'Avoidance fuels addiction—stand firm, and your brain learns courage.',
                'show_date' => Carbon::parse('2025-06-02'),
            ],
            [
                'title' => 'My thoughts are being renewed, rewiring pathways toward purity through devotion to the Sacred Heart.',
                'description' => 'Neuroplasticity shows that consistent choices reshape your brain—each pure thought strengthens righteousness.',
                'show_date' => Carbon::parse('2025-06-03'),
            ],
            [
                'title' => 'I am fearfully and wonderfully made, deserving of wholeness.',
                'description' => 'Self-compassion activates healing brain circuits—treat yourself with the love God shows you.',
                'show_date' => Carbon::parse('2025-06-04'),
            ],
            [
                'title' => 'Today I choose connection over isolation, community over secrecy.',
                'description' => 'Social bonds release oxytocin, countering addiction\'s grip—God designed us for fellowship.',
                'show_date' => Carbon::parse('2025-06-05'),
            ],
            [
                'title' => 'My identity is rooted in divine love, not momentary pleasure.',
                'description' => 'Purpose-driven living strengthens prefrontal control—remember whose you are.',
                'show_date' => Carbon::parse('2025-06-06'),
            ],
            [
                'title' => 'I breathe in joy, finding peace in this present moment.',
                'description' => 'Mindful breathing activates the parasympathetic joy response—be still and know that He is God.',
                'show_date' => Carbon::parse('2025-06-07'),
            ],
            [
                'title' => 'My body is a temple, worthy of honor and respect, consecrated to Mary\'s Immaculate Heart.',
                'description' => 'Treating your body well improves dopamine sensitivity—honor the dwelling place of the Spirit.',
                'show_date' => Carbon::parse('2025-06-08'),
            ],
            [
                'title' => 'I transform my triggers into opportunities for growth.',
                'description' => 'Stress response can be channeled toward positive action—let trials produce perseverance.',
                'show_date' => Carbon::parse('2025-06-09'),
            ],
            [
                'title' => 'Today I practice gratitude, rewiring my brain for joy.',
                'description' => 'Gratitude increases serotonin production—give thanks in all circumstances.',
                'show_date' => Carbon::parse('2025-06-10'),
            ],
            [
                'title' => 'I am becoming the person God created me to be.',
                'description' => 'Identity-based habits create lasting change—align your actions with your true self.',
                'show_date' => Carbon::parse('2025-06-11'),
            ],
            [
                'title' => 'My setbacks do not define me; my response to them does.',
                'description' => 'Resilience builds through adversity—grace abounds where sin increased.',
                'show_date' => Carbon::parse('2025-06-12'),
            ],
            [
                'title' => 'I choose to fill my mind with things that are pure and lovely.',
                'description' => 'Positive input strengthens neural pathways toward virtue—think on these things.',
                'show_date' => Carbon::parse('2025-06-13'),
            ],
            [
                'title' => 'Today I am patient with my journey, finding joy in each step.',
                'description' => 'Process enjoyment creates sustainable motivation—His grace is sufficient for you.',
                'show_date' => Carbon::parse('2025-06-14'),
            ],
            [
                'title' => 'I have the power to choose my response to every impulse.',
                'description' => 'The gap between stimulus and response is where freedom lives—pause and choose wisely.',
                'show_date' => Carbon::parse('2025-06-15'),
            ],
            [
                'title' => 'My worth comes from being loved by God, not from my performance.',
                'description' => 'Shame disrupts healing—rest in unconditional love and acceptance.',
                'show_date' => Carbon::parse('2025-06-16'),
            ],
            [
                'title' => 'I am building new habits that honor my highest values.',
                'description' => 'Consistent small actions create neural superhighways—let your light shine through daily choices.',
                'show_date' => Carbon::parse('2025-06-17'),
            ],
            [
                'title' => 'Today I seek wisdom and understanding for my journey.',
                'description' => 'Learning activates growth mindset pathways—the fear of the Lord is the beginning of wisdom.',
                'show_date' => Carbon::parse('2025-06-18'),
            ],
            [
                'title' => 'I choose vulnerability over isolation, sharing my struggles with trusted friends.',
                'description' => 'Authentic connection reduces cortisol and increases healing—confess your faults to one another.',
                'show_date' => Carbon::parse('2025-06-19'),
            ],
            [
                'title' => 'My brain is capable of remarkable change and healing.',
                'description' => 'Neuroplasticity continues throughout life—be transformed by the renewing of your mind.',
                'show_date' => Carbon::parse('2025-06-20'),
            ],
            [
                'title' => 'I am writing a new story filled with redemptive joy.',
                'description' => 'Positive narrative creates optimistic brain patterns—old things have passed away, all things are new.',
                'show_date' => Carbon::parse('2025-06-21'),
            ],
            [
                'title' => 'Today I practice self-compassion when I struggle.',
                'description' => 'Self-kindness reduces shame cycles—treat yourself as you would a beloved friend.',
                'show_date' => Carbon::parse('2025-06-22'),
            ],
            [
                'title' => 'I find strength in spiritual practices that ground me.',
                'description' => 'Meditation and prayer calm the nervous system—be anxious for nothing, but in everything give thanks.',
                'show_date' => Carbon::parse('2025-06-23'),
            ],
            [
                'title' => 'My desires are being transformed to align with God\'s heart like John, who decreased so',
                'description' => 'nan',
                'show_date' => Carbon::parse('2025-06-24'),
            ],

        ];

        foreach ($affirmations as $item) {
            DailyAffirmative::create($item);
        }
    }
}
