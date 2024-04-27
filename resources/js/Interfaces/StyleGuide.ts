import { Product } from '@/Interfaces/Product';
import { OutfitOfTheDay } from '@/Interfaces/OutfitOfTheDay';

export interface StyleGuide {
  id: number;
  name: string;
  description: string;
  image?: string;

  products: Product[];
  outfitsOfTheDay: OutfitOfTheDay[];
}
