<?php

declare(strict_types=1);

use App\Models\ServiceModel;

$serviceSeeds = [
    [
        'id' => 1,
        'name' => 'Smart Monitoring',
        'summary' => '24/7 monitoring with AI-driven alerts.',
        'description' => 'We combine professional monitoring with predictive analytics to keep every property secure. Our specialists escalate incidents within seconds for faster response times.',
        'icon' => 'shield-lock',
        'badge' => 'Popular',
    ],
    [
        'id' => 2,
        'name' => 'Access Control',
        'summary' => 'Enterprise-grade access for any facility.',
        'description' => 'Deploy badge, mobile, and biometric access that scales with your organization. Detailed audit logs and real-time provisioning keep every door accountable.',
        'icon' => 'key',
        'badge' => 'New',
    ],
    [
        'id' => 3,
        'name' => 'Video Analytics',
        'summary' => 'Cloud video with incident automation.',
        'description' => 'Leverage crystal-clear video streams with automated threat detection and searchable archives. Integrates seamlessly with your SOC stack.',
        'icon' => 'camera-video',
        'badge' => 'AI',
    ],
    [
        'id' => 4,
        'name' => 'Fire & Life Safety',
        'summary' => 'Code-compliant fire detection and response.',
        'description' => 'Certified specialists design, install, and maintain fire panels, sprinklers, and suppression systems for multi-site organizations.',
        'icon' => 'activity',
        'badge' => 'Certified',
    ],
    [
        'id' => 5,
        'name' => 'Cyber-Physical Security',
        'summary' => 'Unified dashboards for OT and IT assets.',
        'description' => 'Gain a converged view of every endpoint with automated policies, vulnerability scanning, and compliance reporting.',
        'icon' => 'cpu',
        'badge' => 'Suite',
    ],
    [
        'id' => 6,
        'name' => 'Emergency Services',
        'summary' => 'Rapid incident response orchestration.',
        'description' => 'Crisis-tested playbooks keep teams aligned during severe weather, outages, or on-site threats with direct escalation paths.',
        'icon' => 'life-buoy',
        'badge' => '24/7',
    ],
];

(new ServiceModel())->seed($serviceSeeds);
