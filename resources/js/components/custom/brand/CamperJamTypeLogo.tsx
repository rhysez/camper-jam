import { Spline } from 'lucide-react';

type Props = {
    size?: "sm" | "md" | "lg"
}

export default function CamperJamTypeLogo({ size = "md" }: Props) {
    let sizing = { textSize: "text-xl", iconSize: 20 }

    if (size === "lg") {
        sizing.textSize = "text-3xl";
        sizing.iconSize = 28;
    } else if (size === "sm") {
        sizing.textSize = "text-lg";
        sizing.iconSize = 16;
    }

    return (
        <div className={'flex items-center gap-2'}>
            <Spline size={sizing.iconSize} className={'text-background'} />
            <h2 className={`${sizing.textSize} font-black text-background font-sans`}>CamperJam</h2>
        </div>
    );
}
