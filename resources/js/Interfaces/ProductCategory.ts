export interface ProductCategory {
  id: number;
  name: string;
  order_position: number;
  slug: string;
  parent_id?: number;

  parent?: ProductCategory;
}

export interface ParentProductCategory {
  id: number;
  name: string;
  order_position: number;
  slug: string;
}
