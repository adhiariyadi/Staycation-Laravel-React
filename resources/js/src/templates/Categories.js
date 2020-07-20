import React from "react";
import Fade from "react-reveal/Fade";
import Button from "./../components/Button";

export default function MostPicked({ data }) {
    return data.map((category, index1) => {
        if (category.itemId.length === 0) return null;

        return (
            <section className="container" key={`category-${index1}`}>
                <Fade bottom>
                    <h4 className="mb-3 font-weight-medium">{category.name}</h4>

                    <div className="container-grid">
                        {category.itemId.length > 0 &&
                            category.itemId.map((item, index2) => {
                                return (
                                    <div
                                        className={`item column-3 row-1`}
                                        key={`category-${index1}-item-${index2}`}
                                    >
                                        <Fade bottom delay={300 * index2}>
                                            <div className="card">
                                                {item.popular === 1 && (
                                                    <div className="tag">
                                                        Popular{" "}
                                                        <span className="font-weight-light">
                                                            Choice
                                                        </span>
                                                    </div>
                                                )}
                                                <figure
                                                    className="img-wrapper"
                                                    style={{ height: 180 }}
                                                >
                                                    <img
                                                        src={
                                                            item.image
                                                                ? `http://localhost:8000/${item.image}`
                                                                : ""
                                                        }
                                                        alt={item.title}
                                                        className="img-cover"
                                                    />
                                                </figure>
                                                <div className="meta-wrapper">
                                                    <Button
                                                        type="link"
                                                        className="stretched-link d-block text-gray-800"
                                                        href={`/properties/${item.id}`}
                                                    >
                                                        <h5 className="h4">
                                                            {item.title}
                                                        </h5>
                                                    </Button>
                                                    <span className="text-gray-500">
                                                        {item.city},{" "}
                                                        {item.country}
                                                    </span>
                                                </div>
                                            </div>
                                        </Fade>
                                    </div>
                                );
                            })}
                    </div>
                </Fade>
            </section>
        );
    });
}
